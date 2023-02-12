create or replace table siswa
(
    nisn     varchar(11)                                 not null
        primary key,
    nis      varchar(11)                                 not null,
    nama     varchar(35)                                 not null,
    id_kelas int                                         not null,
    alamat   text                                        not null,
    no_telp  varchar(13)                                 not null,
    id_spp   int                                         not null,
    password text                                        not null,
    id_level int                                         null,
    diubah   timestamp       default current_timestamp() null on update current_timestamp(),
    dibuat   timestamp       default current_timestamp() null,
    dihapus  enum ('0', '1') default '0'                 not null,
    constraint siswa_ibfk_1
        foreign key (id_kelas) references kelas (id_kelas),
    constraint siswa_ibfk_2
        foreign key (id_spp) references spp (id_spp)
)
    charset = utf8mb4;

create or replace index id_kelas
    on siswa (id_kelas);

create or replace index id_spp
    on siswa (id_spp);

