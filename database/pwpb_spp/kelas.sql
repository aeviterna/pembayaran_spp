create or replace table kelas
(
    id_kelas            int auto_increment
        primary key,
    nama_kelas          varchar(10)                                 not null,
    kompetensi_keahlian varchar(50)                                 not null,
    diubah              timestamp       default current_timestamp() null on update current_timestamp(),
    dibuat              timestamp       default current_timestamp() null,
    dihapus             enum ('0', '1') default '0'                 not null
)
    charset = utf8mb4;

