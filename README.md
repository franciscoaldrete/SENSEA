# SENSEA - Sistema de Evaluación de Competitividad Regional

## 📋 Descripción

SENSEA (Sistema de Evaluación de Competitividad Regional) es una plataforma web desarrollada para el proyecto "Competitividad Regional de Chihuahua e Inserción en el Comercio Internacional" desarrollado por la **Universidad Autónoma de Chihuahua UACH** en colaboración con **University of Utah, University of Texas at El Paso y Plataforma de Inteligencia Competitiva del Sector Privado (PICsp) Chihuahua**.

## 🎯 Objetivo

El sistema permite la captura, análisis e interpretación de variables e indicadores de competitividad regional para municipios de Chihuahua, facilitando la toma de decisiones basada en datos para el desarrollo económico regional.

## 🚀 Características

- **Captura de Variables/Indicadores de Municipios**: Referencia geográfica, demografía, tipología territorial, ambiental, social y económica
- **Análisis de Expertos**: Captura de análisis por categorías (Social, Ambiental y Económico)
- **Análisis e Interpretación de Resultados**: Visualización y análisis de resultados integrados
- **Interfaz Moderna**: Diseño responsive con Bootstrap 5 y Font Awesome
- **Sistema de Usuarios**: Panel de administración con gestión de perfiles

## 🛠️ Tecnologías Utilizadas

- **Backend**: PHP 7.4+
- **Base de Datos**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework CSS**: Bootstrap 5.3.0
- **Iconos**: Font Awesome 6.4.0
- **Fuentes**: Google Fonts (Inter)

## 📦 Instalación

### Requisitos Previos

- XAMPP, WAMP, o servidor web con PHP 7.4+
- MySQL 5.7+
- Navegador web moderno

### Pasos de Instalación

1. **Clonar el repositorio**:
   ```bash
   git clone https://github.com/tu-usuario/sensea.git
   cd sensea
   ```

2. **Configurar la base de datos**:
   - Crear una base de datos MySQL llamada `fcoalder_SENSEA`
   - Importar el archivo SQL desde `FuentedeDatos/InfoBDs/fcoalder_SENSEA.sql`

3. **Configurar la conexión**:
   - Editar los archivos PHP en la carpeta `forms/` y ajustar las credenciales de conexión:
   ```php
   $host = 'localhost';
   $user = 'tu_usuario';
   $pass = 'tu_password';
   $db = 'fcoalder_SENSEA';
   ```

4. **Configurar el servidor web**:
   - Colocar el proyecto en la carpeta `htdocs` de XAMPP
   - Acceder a través de `http://localhost/sensea`

## 🗂️ Estructura del Proyecto

```
sensea/
├── admin.php                 # Panel de administración principal
├── index.html               # Página de inicio
├── assets/                  # Recursos estáticos
│   ├── css/
│   ├── js/
│   └── images/
├── forms/                   # Formularios del sistema
│   ├── header.php          # Header común
│   ├── footer.php          # Footer institucional
│   ├── entidad_geografica_form.php
│   ├── captura_secciones.php
│   └── captura_localizacion.php
├── api/                    # APIs del sistema
├── pages/                  # Páginas adicionales
├── uploads/                # Archivos subidos
└── FuentedeDatos/         # Documentación y datos fuente
```

## 📊 Módulos del Sistema

### 1. Captura de Entidad Geográfica
- Registro de municipios y entidades geográficas
- Información básica: tipo, nombre, código, fuente

### 2. Captura de Localización y Demografía
- Datos de área (tierra, agua, total)
- Población por años (2010, 2015)
- Información de hogares y familias

### 3. Captura de Secciones
- Gestión de diferentes secciones de datos
- Estado de completitud por sección
- Navegación entre módulos

## 🎨 Diseño y UI/UX

- **Paleta de Colores**: Gradientes púrpura a rosa (#8e24aa → #d81b60)
- **Tipografía**: Inter (Google Fonts)
- **Iconografía**: Font Awesome
- **Responsive**: Diseño adaptable a móviles y tablets
- **Accesibilidad**: Contraste adecuado y navegación por teclado

## 🔧 Configuración

### Variables de Entorno
El sistema utiliza configuración directa en los archivos PHP. Para mayor seguridad, se recomienda:

1. Crear un archivo `config.php` con las credenciales
2. Incluir este archivo en los scripts principales
3. Agregar `config.php` al `.gitignore`

### Base de Datos
Las tablas principales incluyen:
- `entidadesgeograficas`: Información básica de municipios
- `DatosLocalizacion`: Datos de localización y demografía
- `TipologiaTerritorial`: Tipología territorial
- `DatosAmbientales`: Datos ambientales
- `DatosSociales`: Datos sociales
- `DatosEconomicos`: Datos económicos

## 🤝 Contribución

1. Fork el proyecto
2. Crear una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abrir un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 👥 Equipo de Desarrollo

- **Universidad Autónoma de Chihuahua UACH**
- **University of Utah**
- **University of Texas at El Paso**
- **Plataforma de Inteligencia Competitiva del Sector Privado (PICsp) Chihuahua**

## 📞 Contacto

Para más información sobre el proyecto SENSEA, contactar a la Universidad Autónoma de Chihuahua.

---

**Desarrollado con ❤️ para Chihuahua | 🏛️ FCA - UACH**
