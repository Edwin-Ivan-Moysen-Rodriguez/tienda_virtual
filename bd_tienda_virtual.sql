-- 1) Crear la base de datos (si no existe)
CREATE DATABASE IF NOT EXISTS tienda_virtual;
USE tienda_virtual;

-- 2) Tabla: rol
CREATE TABLE rol (
  idrol BIGINT(20) NOT NULL AUTO_INCREMENT,
  nombrerol VARCHAR(50) NOT NULL,
  descripcion TEXT NOT NULL,
  status INT(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (idrol)
) ENGINE=InnoDB;

-- 3) Tabla: modulo
CREATE TABLE modulo (
  idmodulo BIGINT(20) NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(50) NOT NULL,
  descripcion TEXT NOT NULL,
  status INT(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (idmodulo)
) ENGINE=InnoDB;

-- 4) Tabla: permisos
CREATE TABLE permisos (
  idpermiso BIGINT(20) NOT NULL AUTO_INCREMENT,
  rolid BIGINT(20) NOT NULL,
  moduloid BIGINT(20) NOT NULL,
  PRIMARY KEY (idpermiso),
  KEY fk_permisos_rol (rolid),
  KEY fk_permisos_modulo (moduloid),
  CONSTRAINT fk_permisos_rol FOREIGN KEY (rolid) 
    REFERENCES rol (idrol) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_permisos_modulo FOREIGN KEY (moduloid) 
    REFERENCES modulo (idmodulo) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 5) Tabla: persona 
CREATE TABLE persona (
  idpersona BIGINT(20) NOT NULL AUTO_INCREMENT,
  identificacion VARCHAR(50) NOT NULL,
  nombres VARCHAR(100) NOT NULL,
  apellidos VARCHAR(100) NOT NULL,
  telefono BIGINT(20) NOT NULL,
  email_user VARCHAR(100) NOT NULL,
  contrasenia VARCHAR(100) NOT NULL,
  rolid BIGINT(20) NOT NULL,
  token VARCHAR(80),
  datecreate DATETIME DEFAULT CURRENT_TIMESTAMP,
  status INT(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (idpersona),
  KEY fk_persona_rol (rolid),
  CONSTRAINT fk_persona_rol FOREIGN KEY (rolid) 
    REFERENCES rol (idrol) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 6) Tabla: categoria
CREATE TABLE categoria (
  idcategoria BIGINT(20) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT NOT NULL,
  datecreate DATETIME DEFAULT CURRENT_TIMESTAMP,
  status INT(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (idcategoria)
) ENGINE=InnoDB;

-- 7) Tabla: producto
CREATE TABLE producto (
  idproducto BIGINT(20) NOT NULL AUTO_INCREMENT,
  codigo VARCHAR(50) NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT NOT NULL,
  precio DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  stock INT(11) NOT NULL DEFAULT 0,
  imagen VARCHAR(100) DEFAULT NULL,
  status INT(11) NOT NULL DEFAULT 1,
  categoriaid BIGINT(20) NOT NULL,
  PRIMARY KEY (idproducto),
  KEY fk_producto_categoria (categoriaid),
  CONSTRAINT fk_producto_categoria FOREIGN KEY (categoriaid) 
    REFERENCES categoria (idcategoria) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 8) Tabla: pedido
CREATE TABLE pedido (
  idpedido BIGINT(20) NOT NULL AUTO_INCREMENT,
  personaid BIGINT(20) NOT NULL,
  fecha DATETIME NOT NULL,
  costo_envio DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  monto DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  tipopagoid BIGINT(20) NOT NULL,
  status INT(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (idpedido),
  KEY fk_pedido_persona (personaid),
  CONSTRAINT fk_pedido_persona FOREIGN KEY (personaid) 
    REFERENCES persona (idpersona) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 9) Tabla: detalle_pedido
CREATE TABLE detalle_pedido (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  pedidoid BIGINT(20) NOT NULL,
  productoid BIGINT(20) NOT NULL,
  precio DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  cantidad INT(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (id),
  KEY fk_detallepedido_pedido (pedidoid),
  KEY fk_detallepedido_producto (productoid),
  CONSTRAINT fk_detallepedido_pedido FOREIGN KEY (pedidoid) 
    REFERENCES pedido (idpedido) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_detallepedido_producto FOREIGN KEY (productoid) 
    REFERENCES producto (idproducto) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 10) Tabla: detalle_temp
CREATE TABLE detalle_temp (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  pedidoid BIGINT(20) NOT NULL,
  productoid BIGINT(20) NOT NULL,
  precio DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  cantidad INT(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (id),
  KEY fk_detalletemp_pedido (pedidoid),
  KEY fk_detalletemp_producto (productoid),
  CONSTRAINT fk_detalletemp_pedido FOREIGN KEY (pedidoid) 
    REFERENCES pedido (idpedido) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_detalletemp_producto FOREIGN KEY (productoid) 
    REFERENCES producto (idproducto) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;