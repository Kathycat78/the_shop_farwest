Script MYSQL pour mcd
-- ----------------------------------------------------------

-- ----------------------------
-- Table: category
-- ----------------------------
CREATE TABLE category (
    id_category INT NOT NULL,
    name VARCHAR(155) NOT NULL,
    description TEXT NOT NULL,
    CONSTRAINT category_PK PRIMARY KEY (id_category)
) ENGINE = InnoDB;

-- ----------------------------
-- Table: user
-- ----------------------------
CREATE TABLE user (
    id_user INT NOT NULL,
    name VARCHAR(150) NOT NULL,
    fiorstname VARCHAR(150) NOT NULL,
    email TEXT NOT NULL,
    password VARCHAR(255) NOT NULL,
    postal_code VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    street VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    phone_number VARCHAR(95) NOT NULL,
    CONSTRAINT user_PK PRIMARY KEY (id_user)
) ENGINE = InnoDB;

-- ----------------------------
-- Table: product
-- ----------------------------
CREATE TABLE product (
    id_product INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    size VARCHAR(100) NOT NULL,
    price FLOAT NOT NULL,
    var_rate BIGINT NOT NULL,
    image VARCHAR(100) NOT NULL,
    id_category INT NOT NULL,
    CONSTRAINT product_PK PRIMARY KEY (id_product),
    CONSTRAINT product_id_category_FK FOREIGN KEY (id_category) REFERENCES category (id_category)
) ENGINE = InnoDB;

-- ----------------------------
-- Table: commender
-- ----------------------------
CREATE TABLE commender (
    id_product INT NOT NULL,
    id_user INT NOT NULL,
    CONSTRAINT commender_PK PRIMARY KEY (id_product, id_user),
    CONSTRAINT commender_id_product_FK FOREIGN KEY (id_product) REFERENCES product (id_product),
    CONSTRAINT commender_id_user_FK FOREIGN KEY (id_user) REFERENCES user (id_user)
) ENGINE = InnoDB;