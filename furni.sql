
INSERT INTO `category_statuses` ( `name`, `created_at`, `updated_at`) VALUES
('Active', NULL, NULL),
('Inactive', NULL, NULL);

 
INSERT INTO `product_statuses` (`name`, `created_at`, `updated_at`) VALUES
('Active', NULL, NULL),
('Inactive', NULL, NULL),
('Out of Stock', NULL, NULL);


INSERT INTO `user_roles` (`name`, `created_at`, `updated_at`) VALUES
('Admin', NULL, NULL),
('Client', NULL, NULL);


INSERT INTO `user_statuses` (`name`, `created_at`, `updated_at`) VALUES
('Active', NULL, NULL),
('Inactive', NULL, NULL),
('Banned', NULL, NULL);

INSERT INTO `categories` (`name`, `slug`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('Beds', 'beds', '1715695856_beds.png', 1, '2024-04-22 23:25:07', '2024-05-14 00:10:56', NULL),
('Sofas', 'sofas', '1715695839_sofas.png', 1, '2024-04-22 23:46:44', '2024-05-14 00:10:39', NULL),
('Lamps', 'lamps', '1715695876_lamps.png', 1, '2024-04-22 23:46:57', '2024-05-14 00:11:16', NULL),
('Outdoor', 'outdoor', '1715695883_outdoor.png', 1, '2024-04-22 23:47:22', '2024-05-14 00:11:23', NULL),
('Storage', 'storage', '1715695888_storage.png', 1, '2024-04-22 23:47:35', '2024-05-14 00:11:28', NULL),
('Chairs', 'chairs', '1715695894_chairs.png', 1, '2024-04-22 23:47:50', '2024-05-14 00:11:34', NULL),
('Tables', 'tables', '1715695901_tables.png', 1, '2024-04-22 23:48:04', '2024-05-14 00:11:41', NULL),
('Rugs', 'rugs', '1715695906_rugs.png', 1, '2024-04-22 23:49:23', '2024-05-14 00:11:46', NULL),
('Accessories', 'accessories', '1715695933_accessories.png', 1, '2024-04-22 23:49:44', '2024-05-14 00:12:13', NULL);




INSERT INTO `coupons` (`code`, `discount`, `quantity`, `valid_from`, `valid_until`, `created_at`, `updated_at`) VALUES
('0EKVS0Y1JS', 10, 8, '2023-11-30 22:52:33', '2024-09-09 13:05:33', '2024-06-03 06:00:56', '2024-06-03 06:00:56'),
('B1Q5DVCPVL', 47, 79, '2023-08-02 07:52:14', '2024-09-19 03:01:46', '2024-06-03 06:00:56', '2024-06-03 06:00:56'),
('R8P5GS3B9C', 82, 1, '2024-04-20 16:09:11', '2024-07-05 07:41:14', '2024-06-03 06:00:56', '2024-06-03 06:00:56'),
('OUPT9WDRBH', 20, 67, '2023-07-17 21:04:51', '2024-06-15 16:26:41', '2024-06-03 06:00:56', '2024-06-03 06:00:56'),
('HENXXV7JDJ', 7, 83, '2023-06-26 16:19:44', '2025-05-26 14:34:49', '2024-06-03 06:00:56', '2024-06-03 06:00:56'),
('F94ZRI0XZ2', 77, 15, '2023-09-26 08:29:22', '2024-09-10 06:56:42', '2024-06-03 06:00:56', '2024-06-03 06:00:56'),
('0WCECQZYU7', 1, 22, '2023-06-20 16:03:26', '2024-08-24 17:36:46', '2024-06-03 06:00:56', '2024-06-03 06:00:56'),
('92WL14O315', 94, 90, '2023-06-04 16:11:34', '2024-07-03 08:44:45', '2024-06-03 06:00:56', '2024-06-03 06:00:56'),
('UVHV0T0P2I', 84, 20, '2023-10-25 18:44:58', '2024-08-31 16:34:03', '2024-06-03 06:00:56', '2024-06-03 06:00:56'),
( 'M5R62QL37C', 26, 96, '2024-01-20 10:35:11', '2025-04-19 11:04:56', '2024-06-03 06:00:56', '2024-06-03 06:00:56');



INSERT INTO `sub_categories` (`name`, `slug`, `image`, `category_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('Daybed', 'daybed', '1714121520_daybed.jpg', 1, 1, '2024-04-25 18:52:00', '2024-04-25 19:45:25', NULL),
('Home office chairs', 'home-office-chairs', '1714122530_home_office_chairs.jpg', 6, 1, '2024-04-25 19:08:50', '2024-04-25 19:08:50', NULL),
('Dining chairs', 'dining-chairs', '1714122516_dining_chairs.jpg', 6, 1, '2024-04-25 19:08:36', '2024-04-25 19:08:36', NULL),
('Sofa beds', 'sofa-beds', '1714121705_sofa_beds.jpg', 1, 1, '2024-04-25 18:55:05', '2024-04-25 18:55:05', NULL),
('Storage beds', 'storage-beds', '1714121750_storage_beds.jpg', 1, 1, '2024-04-25 18:55:50', '2024-04-25 18:55:50', NULL),
('2.5 Seater sofas', '2-5-seater-sofas', '1714121899_2.5_seater_sofas.jpg', 2, 1, '2024-04-25 18:58:19', '2024-04-25 18:58:19', NULL),
('2 Seater sofas', '2-seater-sofas', '1714121928_2_Seater_sofas.jpg', 2, 1, '2024-04-25 18:58:48', '2024-04-25 18:58:48', NULL),
('3 Seater sofas', '3-seater-sofas', '1714121952_3_Seater_sofas.jpg', 2, 1, '2024-04-25 18:59:12', '2024-04-25 18:59:12', NULL),
('Chaise longue sofas', 'chaise-longue-sofas', '1714121979_chaise_longue_sofas.jpg', 2, 1, '2024-04-25 18:59:39', '2024-04-25 18:59:39', NULL),
( 'Corner sofas', 'corner-sofas', '1714122009_corner_sofas.jpg', 2, 1, '2024-04-25 19:00:09', '2024-04-25 19:00:09', NULL),
( 'Footstools', 'footstools', '1714122102_footstools.jpg', 2, 1, '2024-04-25 19:01:42', '2024-04-25 19:01:42', NULL),
( 'Large and 4 seater sofas', 'large-and-4-seater-sofas', '1714122115_Large_and_4_seater_sofas.jpg', 2, 1, '2024-04-25 19:01:55', '2024-04-25 19:01:55', NULL),
( 'Modular sofas', 'modular-sofas', '1714122133_modular_sofas.jpg', 2, 1, '2024-04-25 19:02:13', '2024-04-25 19:02:13', NULL),
( 'Office sofas', 'office-sofas', '1714122151_office_sofas.jpg', 2, 1, '2024-04-25 19:02:31', '2024-04-25 19:02:31', NULL),
( 'Floor lamps', 'floor-lamps', '1714122196_floor_lamps.jpg', 3, 1, '2024-04-25 19:03:16', '2024-04-25 19:03:16', NULL),
( 'Light bulbs', 'light-bulbs', '1714122220_light_bulbs.jpg', 3, 1, '2024-04-25 19:03:40', '2024-04-25 19:03:40', NULL),
( 'Pendants', 'pendants', '1714122240_pendants.jpg', 3, 1, '2024-04-25 19:04:00', '2024-04-25 19:04:00', NULL),
( 'Table lamps', 'table-lamps', '1714122254_table_lamps.jpg', 3, 1, '2024-04-25 19:04:14', '2024-04-25 19:04:14', NULL),
( 'Wall lamps', 'wall-lamps', '1714122277_wall_lamps.jpg', 3, 1, '2024-04-25 19:04:37', '2024-04-25 19:04:37', NULL),
( 'Leather rugs', 'leather-rugs', '1714122320_leather_rugs.jpg', 8, 1, '2024-04-25 19:05:20', '2024-04-25 19:05:20', NULL),
( 'Rectangular rugs', 'rectangular-rugs', '1714122354_rectangular_rugs.jpg', 8, 1, '2024-04-25 19:05:54', '2024-04-25 19:05:54', NULL),
( 'Round rugs', 'round-rugs', '1714122373_round_rugs.jpg', 8, 1, '2024-04-25 19:06:13', '2024-04-25 19:06:13', NULL),
( 'Armchairs', 'armchairs', '1714122402_armchairs.jpg', 6, 1, '2024-04-25 19:06:42', '2024-04-25 19:06:42', NULL),
( 'Barstools', 'barstools', '1714122423_barstools.jpg', 6, 1, '2024-04-25 19:07:03', '2024-04-25 19:07:03', NULL),
( 'Benches', 'benches', '1714122494_benches.jpg', 6, 1, '2024-04-25 19:08:14', '2024-04-25 19:08:14', NULL),
( 'Outdoor chairs', 'outdoor-chairs', '1714122545_outdoor_chairs.jpg', 6, 1, '2024-04-25 19:09:05', '2024-04-25 19:09:05', NULL),
( 'Recliners', 'recliners', '1714122560_recliners.jpg', 6, 1, '2024-04-25 19:09:20', '2024-04-25 19:09:20', NULL),
( 'Seat cushions', 'seat-cushions', '1714122582_seat_cushions.jpg', 6, 1, '2024-04-25 19:09:42', '2024-04-25 19:09:42', NULL),
( 'Bar tables', 'bar-tables', '1714122639_bar_tables.jpg', 7, 1, '2024-04-25 19:10:39', '2024-04-25 19:10:39', NULL),
( 'Bedside tables', 'bedside-tables', '1714122652_bedside_tables.jpg', 7, 1, '2024-04-25 19:10:52', '2024-04-25 19:10:52', NULL),
( 'Coffee tables', 'coffee-tables', '1714122666_coffee_tables.jpg', 7, 1, '2024-04-25 19:11:06', '2024-04-25 19:11:06', NULL),
( 'Conference tables', 'conference-tables', '1714122680_conference_tables.jpg', 7, 1, '2024-04-25 19:11:20', '2024-04-25 19:11:20', NULL),
( 'Desks', 'desks', '1714122691_desks.jpg', 7, 1, '2024-04-25 19:11:31', '2024-04-25 19:11:31', NULL),
( 'Dining tables', 'dining-tables', '1714122703_dining_tables.jpg', 7, 1, '2024-04-25 19:11:43', '2024-04-25 19:11:43', NULL),
( 'Extendable dining tables', 'extendable-dining-tables', '1714122715_extendable_dining_tables.jpg', 7, 1, '2024-04-25 19:11:55', '2024-04-25 19:11:55', NULL),
( 'Outdoor tables', 'outdoor-tables', '1714122728_outdoor_tables.jpg', 7, 1, '2024-04-25 19:12:08', '2024-04-25 19:12:08', NULL),
( 'Side tables', 'side-tables', '1714122742_side_tables.jpg', 7, 1, '2024-04-25 19:12:22', '2024-04-25 19:12:22', NULL),
( 'Bookcases and shelves', 'bookcases-and-shelves', '1714122804_bookcases_and_shelves.jpg', 5, 1, '2024-04-25 19:13:24', '2024-04-25 19:13:24', NULL),
( 'Chest of drawers', 'chest-of-drawers', '1714122821_chest_of_drawers.jpg', 5, 1, '2024-04-25 19:13:41', '2024-04-25 19:13:41', NULL),
( 'Console tables', 'console-tables', '1714122834_console_tables.jpg', 5, 1, '2024-04-25 19:13:54', '2024-04-25 19:13:54', NULL),
( 'Hallway furniture', 'hallway-furniture', '1714122846_hallway_furniture.jpg', 5, 1, '2024-04-25 19:14:06', '2024-04-25 19:14:06', NULL),
( 'Night stands', 'night-stands', '1714122860_night_stands.jpg', 5, 1, '2024-04-25 19:14:20', '2024-04-25 19:14:20', NULL),
( 'Office storage', 'office-storage', '1714122872_office_storage.jpg', 5, 1, '2024-04-25 19:14:32', '2024-04-25 19:14:32', NULL),
( 'Sideboards', 'sideboards', '1714122884_sideboards.jpg', 5, 1, '2024-04-25 19:14:44', '2024-04-25 19:14:44', NULL),
( 'TV-Units', 'tv-units', '1714122898_TV-units.jpg', 5, 1, '2024-04-25 19:14:58', '2024-04-25 19:14:58', NULL),
( 'Wall systems', 'wall-systems', '1714122909_wall_systems.jpg', 5, 1, '2024-04-25 19:15:09', '2024-04-25 19:15:09', NULL),
( 'Care products', 'care-products', '1714122966_care_products.jpg', 9, 1, '2024-04-25 19:16:06', '2024-04-25 19:16:06', NULL),
( 'Cushions', 'cushions', '1714122979_cushions.jpg', 9, 1, '2024-04-25 19:16:19', '2024-04-25 19:16:19', NULL),
( 'Decoration', 'decoration', '1714122991_decoration.jpg', 9, 1, '2024-04-25 19:16:31', '2024-04-25 19:16:31', NULL),
( 'Furniture accessories', 'furniture-accessories', '1714123008_furniture_acessories.jpg', 9, 1, '2024-04-25 19:16:48', '2024-04-25 19:16:48', NULL),
( 'Gallery', 'gallery', '1714123019_gallery.jpg', 9, 1, '2024-04-25 19:16:59', '2024-04-25 19:16:59', NULL),
( 'Mirrors', 'mirrors', '1714123030_mirrors.jpg', 9, 1, '2024-04-25 19:17:10', '2024-04-25 19:17:10', NULL),
( 'Throws and bedspreads', 'throws-and-bedspreads', '1714123041_throws_and_bedspreads.jpg', 9, 1, '2024-04-25 19:17:21', '2024-04-25 19:17:21', NULL),
( 'Vases', 'vases', '1714123052_vases.jpg', 9, 1, '2024-04-25 19:17:32', '2024-04-25 19:17:32', NULL);


INSERT INTO `users` (`username`, `fullname`, `avatar`, `password`, `email`, `phone`, `address`, `role`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
('@Cactus137', 'LeVanThanh', 'profile.png', '$2y$12$0vmjipqxDOB.ykMHuK/Kpec2vQvyvuFfHdThasUqB9CKG2YqxB4/y', 'Blackwhilee04@gmail.com', '0382606012', 'Ha Noi, Viet Nam', 1, 1, NULL, NULL, '2024-04-10 16:35:14', '2024-04-10 16:35:14', NULL),
('zthanh123', 'van thanh', 'profile.png', '$2y$12$0vmjipqxDOB.ykMHuK/Kpec2vQvyvuFfHdThasUqB9CKG2YqxB4/y', 'Blackwlee04@gmail.com', '0382366012', 'Ha Noi, Viet Nam', 2, 1, NULL, NULL, '2024-04-10 16:35:14', '2024-04-10 16:35:14', NULL),
('cactus4g@gmail.com', NULL, 'profile.png', '$2y$12$1Fy.913iWS/4O6b5rludpuUWYyaCH6Wjus5B4tFtzyoxMp5IgzLh2', 'cactus4g@gmail.com', NULL, NULL, 2, 1, NULL, NULL, '2024-06-04 21:55:41', '2024-06-04 21:55:41', NULL);

INSERT INTO `carts` (`user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(3, NULL, NULL);