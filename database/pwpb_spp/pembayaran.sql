create or replace table pembayaran
(
    id_pembayaran int auto_increment
        primary key,
    id_petugas    int                                         not null,
    nisn          varchar(11)                                 not null,
    tgl_bayar     date                                        not null,
    bulan_dibayar varchar(8)                                  not null,
    tahun_dibayar varchar(4)                                  not null,
    id_spp        int                                         not null,
    jumlah_bayar  int                                         not null,
    diubah        timestamp       default current_timestamp() null on update current_timestamp(),
    dibuat        timestamp       default current_timestamp() null,
    dihapus       enum ('0', '1') default '0'                 not null,
    constraint pembayaran_ibfk_1
        foreign key (id_petugas) references petugas (id_petugas),
    constraint pembayaran_ibfk_2
        foreign key (nisn) references siswa (nisn),
    constraint pembayaran_ibfk_3
        foreign key (id_spp) references siswa (id_spp)
)
    charset = utf8mb4;

create or replace index id_petugas
    on pembayaran (id_petugas);

create or replace index id_spp
    on pembayaran (id_spp);

create or replace index nisn
    on pembayaran (nisn);

