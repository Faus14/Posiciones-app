# 📌 Posiciones App


## 🚀 Descripción del Proyecto

Este repositorio contiene una aplicación full-stack que incluye:

- **🔧 Backend**: Desarrollada en Laravel (PHP) con base de datos MySQL dockerizada
- **💻 Frontend**: Desarrollada en Angular

## ✅ Requisitos Previos

Antes de comenzar, asegúrate de tener instalado:

- [Docker](https://www.docker.com/) y [Docker Compose](https://docs.docker.com/compose/) (versiones recientes)  
- [PHP >= 8.1](https://www.php.net/) con [Composer](https://getcomposer.org/)  
- [Node.js >= 18.x](https://nodejs.org/) y [Angular CLI 20.x](https://angular.dev/)  
- Git (para clonar el repositorio)

## 📥 Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/Faus14/Posiciones-app.git
cd Posiciones-app
```

### 2. Instalación automática (recomendada)
El proyecto incluye un script `setup.sh` que automatiza todo el proceso en sistemas Linux/macOS. Asegúrate que el script tenga permisos de ejecución:


```bash
chmod +x setup.sh
./setup.sh
```

**El script realiza automáticamente:**
- Levanta la base de datos MySQL con Docker
- Instala dependencias del backend (Laravel)
- Configura el archivo `.env` y genera claves
- Ejecuta migraciones y seeders
- Instala dependencias del frontend (Angular)
- Levanta ambos servidores

### 3. Instalación manual

Si prefieres instalar paso a paso:

#### Paso 1: Levantar base de datos
```bash
sudo docker compose up -d
sleep 10
```

#### Paso 2: Configurar backend
```bash
cd posiciones-app-back

# Copiar y configurar .env
cp .env.example .env
sed -i 's/DB_PASSWORD=.*/DB_PASSWORD=mi_password_segura/' .env

# Instalar dependencias
composer install

# Generar clave y migrar
php artisan key:generate
php artisan migrate:fresh --seed

# Levantar servidor backend
php artisan serve --port=8000
```

Nota: El servidor backend se quedará ejecutándose. Abre una nueva pestaña/terminal para el siguiente paso.

#### Paso 3: Configurar frontend
```bash
cd ../posiciones-front

# Instalar dependencias
npm install

# Levantar servidor frontend
ng serve --port=4200
```

## 🌐 Acceso a la aplicación

- **Frontend**: [http://localhost:4200](http://localhost:4200)
- **Backend API**: [http://localhost:8000](http://localhost:8000)

Este proyecto cumple con todos los requerimientos solicitados:

## Backend - Laravel
- Listar productos ordenados por usoFrecuente

- Crear posiciones con validaciones

- Listar posiciones ordenadas por usoFrecuente del producto

- Comando de consola posicion:crear para insertar posiciones desde la terminal

```bash
php artisan posicion:crear 1 2 2025-07-10 USD 1500
```

Esto creará una nueva posición si existen los IDs de empresa y producto, la fecha es válida y el precio es mayor a cero.


## Frontend - Angular
- Webapp responsive con menú lateral y navegación entre páginas

- Página que consume el listado de posiciones mostrando

- Página para cargar nuevas posiciones vía formulario