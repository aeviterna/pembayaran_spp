create or replace table petugas
(
    id_petugas int auto_increment
        primary key,
    username   varchar(255)                                not null,
    password   text                                        not null,
    nama       varchar(35)                                 not null,
    id_level   int                                         not null,
    diubah     timestamp       default current_timestamp() null on update current_timestamp(),
    dibuat     timestamp       default current_timestamp() null,
    dihapus    enum ('0', '1') default '0'                 not null,
    constraint petugas_pk
        unique (username)
)
    charset = utf8mb4;

