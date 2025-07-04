#!/bin/bash

echo "🚀 Iniciando instalación de Posiciones App"

echo "🔧 Levantando base de datos MySQL con Docker..."
docker compose up -d

echo "📦 Backend - Instalando dependencias Laravel..."
cd posiciones-app-back
composer install

echo "🔑 Generando APP_KEY de Laravel..."
php artisan key:generate

echo "🛠️ Ejecutando migraciones y seeders..."
php artisan migrate --seed

echo "🌐 Levantando backend en segundo plano (http://localhost:8000)..."
php artisan serve --port=8000 &

cd ..

echo "🌍 Frontend - Instalando dependencias Angular..."
cd posiciones-front
npm install

echo "⚙️ Levantando frontend (http://localhost:4200)..."
ng serve --port=4200
