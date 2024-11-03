create table penerbit
(
    id_penerbit char(4)      not null
        primary key,
    nama        varchar(50)  not null,
    alamat      varchar(255) not null,
    kota        varchar(50)  not null,
    telepon     varchar(20)  not null,
    constraint nama
        unique (nama)
);

create table buku
(
    id_buku     char(5)      not null
        primary key,
    kategori    varchar(255) not null,
    nama_buku   varchar(255) not null,
    harga       int(6)       not null,
    stok        int(3)       not null,
    id_penerbit char(4)      not null,
    constraint buku_penerbit_id_penerbit_fk
        foreign key (id_penerbit) references penerbit (id_penerbit)
);

create table users
(
    id        int unsigned auto_increment
        primary key,
    username  varchar(255) not null,
    password  text         not null,
    full_name varchar(255) not null,
    constraint uniqe_username
        unique (username)
);

