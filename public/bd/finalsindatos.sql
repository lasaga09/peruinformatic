-- MySQL Script generated by MySQL Workbench
-- Wed May 15 10:02:48 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema sisAlmacen
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sisAlmacen
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sisAlmacen` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
USE `sisAlmacen` ;

-- -----------------------------------------------------
-- Table `sisAlmacen`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`categorias` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(40) NOT NULL,
  `descripcion` VARCHAR(100) NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`sedes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`sedes` (
  `idsede` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(100) NOT NULL,
  `distrito` VARCHAR(45) NULL,
  PRIMARY KEY (`idsede`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`proveedores` (
  `idproveedor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `ruc` NCHAR(12) NULL,
  `telefono` VARCHAR(10) NULL,
  `email` VARCHAR(45) NULL,
  `direccion` VARCHAR(100) NULL,
  `id_sede` INT NOT NULL,
  PRIMARY KEY (`idproveedor`),

  CONSTRAINT `fk_proveedor_sede`
    FOREIGN KEY (`id_sede`)
    REFERENCES `sisAlmacen`.`sedes` (`idsede`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`clientes` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(11) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`historial_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`historial_cliente` (
  `idhistorial_cliente` INT NOT NULL AUTO_INCREMENT,
  `id_cliente` INT NOT NULL,
  `descripcion` VARCHAR(100) NULL DEFAULT '---',
  `numero_atencion` INT NULL DEFAULT 0,
  `fecha` TIMESTAMP NULL,
  `id_sede` INT NOT NULL,
  PRIMARY KEY (`idhistorial_cliente`),

  CONSTRAINT `fk_historialcliente_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `sisAlmacen`.`clientes` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historialcliene_sede`
    FOREIGN KEY (`id_sede`)
    REFERENCES `sisAlmacen`.`sedes` (`idsede`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`marcas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`marcas` (
  `idmarcas` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idmarcas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`colores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`colores` (
  `idcolores` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcolores`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`productos` (
  `idproducto` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `id_marca` INT NOT NULL,
  `modelo` VARCHAR(45) NULL,
  `id_color` INT NOT NULL,
  `descripcion` VARCHAR(100) NULL DEFAULT '---',
  `stock` INT NOT NULL DEFAULT 0,
  `pantalla_generica` INT NULL DEFAULT 0,
  `pantalla_original` INT NULL DEFAULT 0,
  `precio_compra` DECIMAL(5,2) NULL,
  `precio_venta` DECIMAL(5,2) NOT NULL,
  `imagen` VARCHAR(254) NOT NULL,
  `id_proveedor` INT NOT NULL,
  `id_categoria` INT NOT NULL,
  `id_sede` INT NOT NULL,
  PRIMARY KEY (`idproducto`),

  CONSTRAINT `fk_producto_categoria`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `sisAlmacen`.`categorias` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_proveedor`
    FOREIGN KEY (`id_proveedor`)
    REFERENCES `sisAlmacen`.`proveedores` (`idproveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_sede`
    FOREIGN KEY (`id_sede`)
    REFERENCES `sisAlmacen`.`sedes` (`idsede`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_marca`
    FOREIGN KEY (`id_marca`)
    REFERENCES `sisAlmacen`.`marcas` (`idmarcas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_color`
    FOREIGN KEY (`id_color`)
    REFERENCES `sisAlmacen`.`colores` (`idcolores`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`roles` (
  `idrol` INT NOT NULL AUTO_INCREMENT,
  `rol` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(100) NULL DEFAULT '----',
  PRIMARY KEY (`idrol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`usuarios` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `id_rol` INT NOT NULL,
  `id_sede` INT NOT NULL,
  PRIMARY KEY (`idusuario`),
 
  CONSTRAINT `fk_usuario_rol`
    FOREIGN KEY (`id_rol`)
    REFERENCES `sisAlmacen`.`roles` (`idrol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_sede`
    FOREIGN KEY (`id_sede`)
    REFERENCES `sisAlmacen`.`sedes` (`idsede`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`compras` (
  `idcompras` INT NOT NULL AUTO_INCREMENT,
  `id_proveedor` INT NOT NULL,
  `id_sede` INT NOT NULL,
  `fecha_compra` TIMESTAMP NULL,
  `direccion` VARCHAR(45) NULL,
  `total` DECIMAL(5,2) NOT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`idcompras`),

  CONSTRAINT `fk_compras_proveedor`
    FOREIGN KEY (`id_proveedor`)
    REFERENCES `sisAlmacen`.`proveedores` (`idproveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compras_sede`
    FOREIGN KEY (`id_sede`)
    REFERENCES `sisAlmacen`.`sedes` (`idsede`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compras_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `sisAlmacen`.`usuarios` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`detalle_compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`detalle_compra` (
  `iddetalle_compra` INT NOT NULL AUTO_INCREMENT,
  `id_compra` INT NOT NULL,
  `id_producto` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `precio` DECIMAL(5,2) NOT NULL,
  `descripcion` VARCHAR(100) NULL DEFAULT '---',
  `importe` DECIMAL(5,2) NULL,
  PRIMARY KEY (`iddetalle_compra`),

  CONSTRAINT `fk_detalle_compra_compra`
    FOREIGN KEY (`id_compra`)
    REFERENCES `sisAlmacen`.`compras` (`idcompras`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_comppra_producto`
    FOREIGN KEY (`id_producto`)
    REFERENCES `sisAlmacen`.`productos` (`idproducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`ventas` (
  `idventas` INT NOT NULL AUTO_INCREMENT,
  `id_cliente` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  `total` DECIMAL(5,2) NOT NULL,
  `fecha` DATETIME NULL,
  `id_sede` INT NOT NULL,
  PRIMARY KEY (`idventas`),

  CONSTRAINT `fk_ventas_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `sisAlmacen`.`clientes` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `sisAlmacen`.`usuarios` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_sede`
    FOREIGN KEY (`id_sede`)
    REFERENCES `sisAlmacen`.`sedes` (`idsede`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisAlmacen`.`detalle_venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisAlmacen`.`detalle_venta` (
  `iddetalle_venta` INT NOT NULL AUTO_INCREMENT,
  `id_venta` INT NOT NULL,
  `id_producto` INT NOT NULL,
  `descripcion` VARCHAR(100) NULL,
  `cantidad` INT NOT NULL,
  `precio` DECIMAL(5,2) NOT NULL,
  `importe` DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (`iddetalle_venta`),

  CONSTRAINT `fk_detalle_venta_producto`
    FOREIGN KEY (`id_producto`)
    REFERENCES `sisAlmacen`.`productos` (`idproducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_venta_venta`
    FOREIGN KEY (`id_venta`)
    REFERENCES `sisAlmacen`.`ventas` (`idventas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
