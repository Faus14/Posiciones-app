#!/bin/bash

echo "🚀 Iniciando instalación de Posiciones App"

echo "🔧 Levantando base de datos MySQL con Docker..."
sudo docker compose up -d

echo "⏳ Esperando que MySQL esté listo..."

# Espera hasta que MySQL responda correctamente al ping
until sudo docker exec posiciones-app-mysql-1 mysqladmin ping -h "localhost" --silent; do
  echo "MySQL no está listo, esperando 2 segundos..."
  sleep 8
done

echo "MySQL está listo."

echo "📦 Backend - Instalando dependencias Laravel..."
cd posiciones-app-back

echo "📄 Copiando archivo .env..."
cp .env.example .env

echo "🔐 Configurando conexión a MySQL en .env..."
sed -i 's/DB_PASSWORD=.*/DB_PASSWORD=mi_password_segura/' .env

composer install

echo "🔑 Generando APP_KEY de Laravel..."
php artisan key:generate

echo "🛠️ Ejecutando migraciones y seeders (reseteando base de datos)..."
php artisan migrate:fresh --seed

echo "🌐 Levantando backend en segundo plano (http://localhost:8000)..."
sudo fuser -k 8000/tcp
php artisan serve --port=8000 &

cd ..

echo "🌍 Frontend - Instalando dependencias Angular..."
cd posiciones-front

if [ ! -f package.json ]; then
  echo "❌ ERROR: No se encontró package.json en posiciones-front. ¿Estás seguro que el frontend está allí?"
  exit 1
fi

npm install

echo "⚙️ Levantando frontend (http://localhost:4200)..."
ng serve --port=4200
echo "🎉 Instalación completada. Accede a la aplicación en http://localhost:4200"
