-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 21, 2022 lúc 11:03 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Cơ sở dữ liệu: `fastfood`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `visible`) VALUES
(1, 'KFC', 1),
(2, 'Jollibee', 1),
(3, 'Domino\'sPizza', 1),
(4, 'Cocacola', 1),
(5, 'McDonald\'s', 1),
(6, 'Lotteria', 1),
(7, 'Burger King', 1),
(8, 'PizzaHut', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `visible`) VALUES
(1, 'Gà rán', 1),
(2, 'Nước', 1),
(3, 'Pizza', 1),
(4, 'Hamburger', 1),
(5, 'Snack', 1),
(18, 'Bánh mì', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8_unicode_ci NOT NULL,
  `product_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `date` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `product_soluong` tinyint(255) DEFAULT 1,
  `brand_id` int(100) NOT NULL,
  `cat_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `views`, `visible`, `date`, `product_soluong`, `brand_id`, `cat_id`) VALUES
(60, 'Combo Buger', 99000, 'Hamburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc \"nước xốt đặc biệt\", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát.[1]\r\n\r\nThuật ngữ \"burger\" cũng có thể chỉ đến miếng thịt (patty) đặt trên món bánh, đặc biệt là ở Vương quốc Anh, nơi thuật ngữ \"patty\" hiếm khi được sử dụng, hoặc chỉ đơn thuần là ám chỉ đến thịt bò xay. Vì từ hamburger thường ngụ ý đến thịt bò, nên để rõ ràng hơn, tên của loại thịt hoặc nguyên liệu thay thế thịt có thể được đặt trước \"burger\", chẳng hạn như burger bò (beef burger), burger gà tây (turkey burger), burger bò rừng (Bison burger) hoặc burger chay (vegie burger).', '1.jpg', 'buger, hambuger, combo buger', 0, 1, '', 99, 6, 4),
(61, 'Combo A++', 599000, 'Hamburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc \"nước xốt đặc biệt\", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát.[1]\r\n\r\nThuật ngữ \"burger\" cũng có thể chỉ đến miếng thịt (patty) đặt trên món bánh, đặc biệt là ở Vương quốc Anh, nơi thuật ngữ \"patty\" hiếm khi được sử dụng, hoặc chỉ đơn thuần là ám chỉ đến thịt bò xay. Vì từ hamburger thường ngụ ý đến thịt bò, nên để rõ ràng hơn, tên của loại thịt hoặc nguyên liệu thay thế thịt có thể được đặt trước \"burger\", chẳng hạn như burger bò (beef burger), burger gà tây (turkey burger), burger bò rừng (Bison burger) hoặc burger chay (vegie burger).', '2.jpg', 'ga ran, gà, gà rán, chicken, nước, combo a, gà 2 miếng', 0, 1, '', 99, 1, 3),
(63, 'Bánh mì', 69000, 'Hamburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc \"nước xốt đặc biệt\", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát.[1]\r\n\r\nThuật ngữ \"burger\" cũng có thể chỉ đến miếng thịt (patty) đặt trên món bánh, đặc biệt là ở Vương quốc Anh, nơi thuật ngữ \"patty\" hiếm khi được sử dụng, hoặc chỉ đơn thuần là ám chỉ đến thịt bò xay. Vì từ hamburger thường ngụ ý đến thịt bò, nên để rõ ràng hơn, tên của loại thịt hoặc nguyên liệu thay thế thịt có thể được đặt trước \"burger\", chẳng hạn như burger bò (beef burger), burger gà tây (turkey burger), burger bò rừng (Bison burger) hoặc burger chay (vegie burger).', '4.jpg', 'bánh mì, bánh mì kẹp', 0, 1, '', 99, 1, 18),
(64, 'Buger AA', 59000, 'Hamburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc \"nước xốt đặc biệt\", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát.[1]\r\n\r\nThuật ngữ \"burger\" cũng có thể chỉ đến miếng thịt (patty) đặt trên món bánh, đặc biệt là ở Vương quốc Anh, nơi thuật ngữ \"patty\" hiếm khi được sử dụng, hoặc chỉ đơn thuần là ám chỉ đến thịt bò xay. Vì từ hamburger thường ngụ ý đến thịt bò, nên để rõ ràng hơn, tên của loại thịt hoặc nguyên liệu thay thế thịt có thể được đặt trước \"burger\", chẳng hạn như burger bò (beef burger), burger gà tây (turkey burger), burger bò rừng (Bison burger) hoặc burger chay (vegie burger).', '5.jpg', 'buger, hambuger, combo buger', 0, 1, '', 99, 1, 4),
(65, 'Buger A+', 49000, 'Hamburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc \"nước xốt đặc biệt\", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát.[1]\r\n\r\nThuật ngữ \"burger\" cũng có thể chỉ đến miếng thịt (patty) đặt trên món bánh, đặc biệt là ở Vương quốc Anh, nơi thuật ngữ \"patty\" hiếm khi được sử dụng, hoặc chỉ đơn thuần là ám chỉ đến thịt bò xay. Vì từ hamburger thường ngụ ý đến thịt bò, nên để rõ ràng hơn, tên của loại thịt hoặc nguyên liệu thay thế thịt có thể được đặt trước \"burger\", chẳng hạn như burger bò (beef burger), burger gà tây (turkey burger), burger bò rừng (Bison burger) hoặc burger chay (vegie burger).', '6.jpg', 'buger, hambuger, combo buger', 0, 1, '', 99, 7, 4),
(66, 'Combo Buger A', 199000, 'Hamburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc \"nước xốt đặc biệt\", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát.[1]\r\n\r\nThuật ngữ \"burger\" cũng có thể chỉ đến miếng thịt (patty) đặt trên món bánh, đặc biệt là ở Vương quốc Anh, nơi thuật ngữ \"patty\" hiếm khi được sử dụng, hoặc chỉ đơn thuần là ám chỉ đến thịt bò xay. Vì từ hamburger thường ngụ ý đến thịt bò, nên để rõ ràng hơn, tên của loại thịt hoặc nguyên liệu thay thế thịt có thể được đặt trước \"burger\", chẳng hạn như burger bò (beef burger), burger gà tây (turkey burger), burger bò rừng (Bison burger) hoặc burger chay (vegie burger).', '6.jpg', 'buger, hambuger, combo buger', 0, 1, '', 99, 6, 4),
(67, 'Gà rán B++', 39000, 'Hamburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc \"nước xốt đặc biệt\", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát.[1]\r\n\r\nThuật ngữ \"burger\" cũng có thể chỉ đến miếng thịt (patty) đặt trên món bánh, đặc biệt là ở Vương quốc Anh, nơi thuật ngữ \"patty\" hiếm khi được sử dụng, hoặc chỉ đơn thuần là ám chỉ đến thịt bò xay. Vì từ hamburger thường ngụ ý đến thịt bò, nên để rõ ràng hơn, tên của loại thịt hoặc nguyên liệu thay thế thịt có thể được đặt trước \"burger\", chẳng hạn như burger bò (beef burger), burger gà tây (turkey burger), burger bò rừng (Bison burger) hoặc burger chay (vegie burger).', '7.jpg', 'buger, hambuger, combo buger', 0, 1, '', 99, 2, 1),
(68, 'Khoai tây chiên', 19000, 'Hamburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc \"nước xốt đặc biệt\", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát.[1]\r\n\r\nThuật ngữ \"burger\" cũng có thể chỉ đến miếng thịt (patty) đặt trên món bánh, đặc biệt là ở Vương quốc Anh, nơi thuật ngữ \"patty\" hiếm khi được sử dụng, hoặc chỉ đơn thuần là ám chỉ đến thịt bò xay. Vì từ hamburger thường ngụ ý đến thịt bò, nên để rõ ràng hơn, tên của loại thịt hoặc nguyên liệu thay thế thịt có thể được đặt trước \"burger\", chẳng hạn như burger bò (beef burger), burger gà tây (turkey burger), burger bò rừng (Bison burger) hoặc burger chay (vegie burger).', '8.jpg', 'khoai tây chiên, khoai, khoai tây, chiên', 0, 1, '', 127, 8, 5),
(69, 'Gà chiên', 189000, 'Hamburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc \"nước xốt đặc biệt\", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát.[1]\r\n\r\nThuật ngữ \"burger\" cũng có thể chỉ đến miếng thịt (patty) đặt trên món bánh, đặc biệt là ở Vương quốc Anh, nơi thuật ngữ \"patty\" hiếm khi được sử dụng, hoặc chỉ đơn thuần là ám chỉ đến thịt bò xay. Vì từ hamburger thường ngụ ý đến thịt bò, nên để rõ ràng hơn, tên của loại thịt hoặc nguyên liệu thay thế thịt có thể được đặt trước \"burger\", chẳng hạn như burger bò (beef burger), burger gà tây (turkey burger), burger bò rừng (Bison burger) hoặc burger chay (vegie burger).', '9.jpg', 'ga, ga chien gion, ga ran, combo ga', 0, 1, '', 99, 4, 1),
(70, 'Combo Gà + Nước', 299000, 'Hamburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc \"nước xốt đặc biệt\", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát.[1]\r\n\r\nThuật ngữ \"burger\" cũng có thể chỉ đến miếng thịt (patty) đặt trên món bánh, đặc biệt là ở Vương quốc Anh, nơi thuật ngữ \"patty\" hiếm khi được sử dụng, hoặc chỉ đơn thuần là ám chỉ đến thịt bò xay. Vì từ hamburger thường ngụ ý đến thịt bò, nên để rõ ràng hơn, tên của loại thịt hoặc nguyên liệu thay thế thịt có thể được đặt trước \"burger\", chẳng hạn như burger bò (beef burger), burger gà tây (turkey burger), burger bò rừng (Bison burger) hoặc burger chay (vegie burger).', '10.jpg', 'ga ran, gà, gà rán, chicken, nước, combo a, gà 2 miếng', 0, 1, 'January 16, 22', 10, 1, 1),
(71, 'Pizza Viền Phomai', 169000, 'Hamburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc \"nước xốt đặc biệt\", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát.[1]\r\n\r\nThuật ngữ \"burger\" cũng có thể chỉ đến miếng thịt (patty) đặt trên món bánh, đặc biệt là ở Vương quốc Anh, nơi thuật ngữ \"patty\" hiếm khi được sử dụng, hoặc chỉ đơn thuần là ám chỉ đến thịt bò xay. Vì từ hamburger thường ngụ ý đến thịt bò, nên để rõ ràng hơn, tên của loại thịt hoặc nguyên liệu thay thế thịt có thể được đặt trước \"burger\", chẳng hạn như burger bò (beef burger), burger gà tây (turkey burger), burger bò rừng (Bison burger) hoặc burger chay (vegie burger).', '12.jpg', 'pizza, phomai', 0, 1, '', 99, 8, 3),
(72, 'Pizza++', 159000, 'Hamburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc \"nước xốt đặc biệt\", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát.[1]\r\n\r\nThuật ngữ \"burger\" cũng có thể chỉ đến miếng thịt (patty) đặt trên món bánh, đặc biệt là ở Vương quốc Anh, nơi thuật ngữ \"patty\" hiếm khi được sử dụng, hoặc chỉ đơn thuần là ám chỉ đến thịt bò xay. Vì từ hamburger thường ngụ ý đến thịt bò, nên để rõ ràng hơn, tên của loại thịt hoặc nguyên liệu thay thế thịt có thể được đặt trước \"burger\", chẳng hạn như burger bò (beef burger), burger gà tây (turkey burger), burger bò rừng (Bison burger) hoặc burger chay (vegie burger).', '13.jpg', 'pizza', 0, 1, '', 99, 8, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  `user_address` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'guest',
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `ip_address`, `name`, `email`, `password`, `country`, `city`, `contact`, `user_address`, `image`, `role`, `visible`) VALUES
(14, '127.0.0.1', 'Phuoc Dat', 'admin@gmail.com', '750a301a171efe0917a93d2c0c441d8b', NULL, NULL, 'contact2', 'address2', '1.jpg', 'admin', 1),
(31, '::1', 'asd', 'test@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'AO', 'asd', 'asd', 'asd', '1634263844-698-thumbnail-width640height480.jpg', 'admin', 1),
(40, '::1', 'oc cho', 'cho@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'CG', 'asd', 'asd', 'asd', '1634263844-698-thumbnail-width640height480.jpg', 'guest', 1),
(42, '::1', 'Lê Phước Đạt', 'dat@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'VN', 'Huyện Quảng Điền', '123123123', '111', '5.jpg', 'admin', 1),
(43, '127.0.0.1', '111', 'ac@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'HR', 'â', 'd', 'a', '3.png', 'guest', 1),
(44, '127.0.0.1', 'Dat', 'ac1@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'VN', 'DN', '000000', 'DN', '20.jpg', 'guest', 1),
(45, '127.0.0.1', 'Dat', 'ac12@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'VN', 'DN', '000000000000000', 'DN', '7.jpg', 'guest', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

