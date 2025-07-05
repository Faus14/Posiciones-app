# 📌 Posiciones App


## 🚀 Descripción del Proyecto

Este repositorio contiene una aplicación full-stack que incluye:

- **🔧 Backend**: Desarrollada en Laravel (PHP) con base de datos MySQL dockerizada
- **💻 Frontend**: Desarrollada en Angular

## ✅ Requisitos Previos

Antes de comenzar, asegúrate de tener instalado:

- [Docker](https://www.docker.com/) y [Docker Compose](https://docs.docker.com/compose/)
- [PHP >= 8.x](https://www.php.net/) con [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) y [Angular CLI](https://angular.io/cli)
- Git

## 📥 Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/Faus14/Posiciones-app.git
cd Posiciones-app
```

### 2. Instalación automática (recomendada)

El proyecto incluye un script que automatiza todo el proceso:

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
- **Base de datos**: MySQL en puerto 3306

## 📁 Estructura del proyecto

```
Posiciones-app/
├── posiciones-app-back/     # API Laravel
├── posiciones-app-front/    # Aplicación Angular
├── docker-compose.yml       # Configuración MySQL
├── setup.sh                 # Script de instalación
└── README.md
```

## 🛠️ Tecnologías utilizadas

- **Backend**: Laravel (PHP), MySQL, Docker
- **Frontend**: Angular, TypeScript, Bootstrap
- **Herramientas**: Docker Compose, Angular CLI, Composer

## 📝 Funcionalidades principales

- ✅ Gestión de posiciones con CRUD completo
- ✅ API RESTful con validaciones
- ✅ Interfaz responsive
- ✅ Base de datos dockerizada

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Para contribuir:

1. Fork el proyecto
2. Crea una rama para tu feature
3. Commit tus cambios
4. Push a la rama
5. Abre un Pull Request

---

⭐ **¡Si este proyecto te fue útil, no olvides darle una estrella!** ⭐