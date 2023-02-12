create or replace table spp
(
    id_spp  int auto_increment
        primary key,
    tahun   int                                         not null,
    nominal int                                         not null,
    diubah  timestamp       default current_timestamp() null on update current_timestamp(),
    dibuat  timestamp       default current_timestamp() null,
    dihapus enum ('0', '1') default '0'                 not null
)
    charset = utf8mb4;

