-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 07:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopease`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_email` varchar(100) NOT NULL,
  `a_password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Keerthan', 'keerthanshetty7@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ca_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ca_quantity` bigint(30) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(3, 'Grocery'),
(5, 'Electronics'),
(9, 'Mobiles'),
(10, 'Fashion'),
(11, 'Home&Kitchen'),
(12, 'Beauty & Personal Care');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `co_id` int(11) NOT NULL,
  `co_name` varchar(1000) NOT NULL,
  `co_email` varchar(1000) NOT NULL,
  `co_subject` varchar(1000) NOT NULL,
  `co_message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`co_id`, `co_name`, `co_email`, `co_subject`, `co_message`) VALUES
(1, 'dhanya shetty', 'dhanyashetty@gmail.com', 'Store related', 'store related queries whether i can visit');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_feedback` varchar(1000) NOT NULL,
  `op_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `f_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_feedback`, `op_id`, `u_id`, `rating`, `p_id`, `f_date`) VALUES
(1, 'Good product. Satisfied.', 13, 1, 4, 20, '2025-04-15'),
(2, 'Good product amazing quality', 14, 1, 4, 15, '2025-04-15'),
(3, 'Good product', 12, 1, 1, 9, '2025-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `n_id` int(11) NOT NULL,
  `n_name` varchar(1000) NOT NULL,
  `n_email` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`n_id`, `n_name`, `n_email`) VALUES
(1, 'dhanya shetty', 'dhanyashetty@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `op_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `op_status` varchar(100) NOT NULL DEFAULT 'ordered',
  `f_name` varchar(1000) NOT NULL,
  `l_name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `num` bigint(20) NOT NULL,
  `add1` varchar(1000) NOT NULL,
  `add2` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `state` varchar(1000) NOT NULL,
  `zip` int(11) NOT NULL,
  `transaction` bigint(20) DEFAULT NULL,
  `payment` varchar(1000) NOT NULL,
  `u_id` int(11) NOT NULL,
  `admin_status` varchar(1000) NOT NULL DEFAULT 'notpaid',
  `admin_transaction` bigint(20) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`op_id`, `p_id`, `p_quantity`, `op_status`, `f_name`, `l_name`, `email`, `num`, `add1`, `add2`, `city`, `state`, `zip`, `transaction`, `payment`, `u_id`, `admin_status`, `admin_transaction`, `date`) VALUES
(12, 9, 2, 'delivered', 'dhanya', 'shetty', 'dhanyashetty@gmail.com', 47584759875, 'bava', 'talapady', 'talapapady', 'karnataka', 787556, 45637538473876, 'Online', 1, 'notpaid', NULL, '2025-04-15'),
(13, 20, 1, 'delivered', 'dhanya', 'shetty', 'dhanyashetty@gmail.com', 47584759875, 'bava', 'talapady', 'talapapady', 'karnataka', 787556, 45637538473876, 'Online', 1, 'paid', 2345678990009, '2025-04-15'),
(14, 15, 1, 'delivered', 'dhanya', 'shetty', 'dhanyashetty@gmail.com', 47584759875, 'bava', 'talapady', 'talapapady', 'karnataka', 787556, NULL, 'COD', 1, 'paid', 87687675645657, '2025-04-15'),
(15, 15, 1, 'delivered', 'dhanya', 'shetty', 'dhanyashetty@gmail.com', 47584759875, 'bava', 'talapady', 'talapapady', 'karnataka', 787556, NULL, 'COD', 1, 'notpaid', NULL, '2025-04-15'),
(16, 18, 2, 'delivered', 'dhanya', 'shetty', 'dhanyashetty@gmail.com', 47584759875, 'bava', 'talapady', 'talapapady', 'karnataka', 787556, NULL, 'COD', 1, 'notpaid', NULL, '2025-04-15'),
(17, 30, 1, 'delivered', 'Dhanya', 'shetty', 'dhanyashetty@gmail.com', 9865677677, 'Bava', 'Talapady', 'Talapady', 'Karnataka', 5678907, NULL, 'COD', 1, 'notpaid', NULL, '2025-04-26'),
(18, 8, 1, 'ordered', 'dhanya', 'shetty', 'dhanyashetty@gmail.com', 6457457474, 'bava', 'talapady', 'manglore', 'karnataka', 5874454, NULL, 'COD', 1, 'notpaid', NULL, '2025-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_description` varchar(1000) NOT NULL,
  `p_complete_description` varchar(1000) NOT NULL,
  `p_image` varchar(100) NOT NULL,
  `p_price` bigint(20) NOT NULL,
  `p_stock` int(100) NOT NULL,
  `p_status` varchar(100) NOT NULL DEFAULT 'new',
  `v_id` int(11) NOT NULL,
  `c_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_description`, `p_complete_description`, `p_image`, `p_price`, `p_stock`, `p_status`, `v_id`, `c_name`) VALUES
(2, 'Apple iPhone 16 Pro', '(Desert Titanium, 256 GB)', 'The Apple iPhone 16 Pro in Desert Titanium is a masterpiece of design and technology. It features a 6.3-inch Super Retina XDR display with Dynamic Island and ProMotion technology, offering adaptive refresh rates up to 120Hz for smooth visuals. Powered by the A18 Pro chip, it delivers exceptional performance and efficiency. The camera system includes 48MP main cameras, a 12MP telephoto lens, and a 12MP front camera, enabling stunning photography and 4K video recording at 120 fps with Dolby Vision. With 256GB storage, it provides ample space for your apps, photos, and videos. The titanium build ensures durability while maintaining a lightweight feel, making it a premium choice for tech enthusiasts.', 'upload/pic2.jpg', 122900, 18, 'accepted', 1, 'Mobiles'),
(4, 'Infinix Smart TV', 'Infinix 80 cm (32 inch) HD Ready LED Smart Linux TV ', 'Infinix Smart TVs are designed to elevate your entertainment experience with cutting-edge features and sleek designs. They offer vibrant visuals powered by QLED technology and HDR10, ensuring rich and lifelike colors with exceptional detail. The TVs come equipped with Dolby Audio and powerful speakers for a cinematic sound experience. With a bezel-less design, they blend seamlessly into your living space, adding a touch of elegance. Powered by quad-core processors, they deliver smooth performance for streaming, gaming, and browsing. Infinix Smart TVs also support popular apps like Netflix, Prime Video, and YouTube, making them a versatile choice for modern households.', 'upload/img1.jpg', 7999, 10, 'accepted', 1, 'Electronics'),
(6, 'EPSON Printer', 'EPSON L3251 Multi-Function WIFI Color Ink Tank Printer', 'Epson printers are renowned for their reliability and innovative features, catering to both home and office needs. The EcoTank series, for instance, offers high-yield ink bottles and spill-free refilling, ensuring economical and hassle-free printing. With Wi-Fi and Wi-Fi Direct connectivity, you can print directly from your smart devices, making it incredibly convenient. Epson\'s Heat-Free Technology ensures energy-efficient operation, while delivering high-quality prints with resolutions up to 5760 dpi. Whether you need to print, scan, or copy, Epson printers are designed to deliver exceptional performance and durability.', 'upload/img2.jpg', 4333, 12, 'accepted', 1, 'Electronics'),
(8, 'SONY Camera', 'SONY RX10M4 (20.2 MP, 25x Optical Zoom, 100x Digital Zoom, Black)', 'Sony cameras are celebrated for their cutting-edge technology and exceptional image quality, catering to both amateur and professional photographers. Their mirrorless cameras, like the Alpha series, feature full-frame sensors and advanced autofocus systems, ensuring stunning detail and clarity. Sony\'s Cyber-shot compact cameras are perfect for on-the-go photography, offering portability without compromising on performance. With features like 4K video recording, high-speed continuous shooting, and interchangeable lenses, Sony cameras are versatile tools for capturing breathtaking moments. Whether you\'re into landscapes, portraits, or action shots, Sony has a camera to suit your needs.', 'upload/img3.jpg', 131489, 8, 'accepted', 1, 'Electronics'),
(9, 'ACER Aspire Laptop', 'ACER Aspire 3 Intel Celeron Dual Core- (8 GB/128 GB SSD/Windows 11 Home) A311-45 Thin and Light Laptop ', 'The Acer Aspire series is designed to cater to everyday computing needs with style and efficiency. These laptops feature powerful processors like Intel Core or AMD Ryzen, ensuring smooth multitasking and performance. With Full HD displays and Acer ComfyView technology, they deliver vibrant visuals and reduce glare for comfortable viewing. The Aspire laptops come equipped with SSD storage for faster data access and boot times, and expandable memory options to suit your requirements. Their lightweight and sleek designs make them highly portable, while features like Wi-Fi 6 and multiple connectivity ports ensure seamless integration with your devices. Perfect for students, professionals, and casual users, the Acer Aspire series combines affordability with reliability.', 'upload/img4.jpg', 32000, 13, 'accepted', 2, 'Electronics'),
(10, 'Vivo V50 5G', '(Rose Red ,256GB)', 'The Vivo V50 5G in Rose Red is a stunning smartphone that combines elegance with cutting-edge technology. It features a 6.77-inch AMOLED display with a 120Hz refresh rate, delivering smooth and vibrant visuals. Powered by the Snapdragon 7 Gen 3 processor and equipped with 8GB RAM and 128GB storage, it ensures seamless multitasking and ample space for your apps and media. The camera setup includes 50MP dual rear cameras and a 50MP front camera, perfect for capturing high-quality photos and videos. With a 6000mAh battery and 90W FlashCharge, it offers long-lasting performance and quick charging. The Vivo V50 5G also boasts IP68 and IP69 dust and water resistance, making it durable for everyday use.', 'upload/img6.jpg', 36999, 20, 'accepted', 2, 'Mobiles'),
(11, 'DELL Inspiron Laptop', 'DELL Inspiron 3530 Intel Core i3 13th Gen 1305U- ( 8GB/ 512 GB SSD/ Windows 11 Home) ', 'The Dell Inspiron series is designed to meet the needs of everyday users, offering a perfect balance of performance, style, and affordability. These laptops come with a range of display options, including 13-inch, 15.6-inch, and 17-inch screens, some featuring 4K UHD resolution for stunning visuals. Powered by Intel Core i7 or AMD Ryzen 7 processors, they deliver smooth multitasking and reliable performance. With up to 32GB RAM and fast SSD storage, the Inspiron laptops ensure quick data access and ample space for your files. The series also includes 2-in-1 models, allowing you to switch between laptop and tablet modes for added versatility. Features like Dolby Atmos audio, Comfort View technology to reduce eye strain, and Wi-Fi 6 connectivity make these laptops ideal for work, study, and entertainment3.', 'upload/img8.jpg', 40590, 5, 'accepted', 2, 'Electronics'),
(12, 'Lenova IdeaPad Laptop', 'Lenova IdeaPad Slim 5 WUXGA IPS AI PC Intel Core Ultra 5 125H (16 GB /512 GB SSD/ Windows 11 Home)', 'The Lenovo IdeaPad Slim series is designed for modern users who value portability and performance. These laptops feature Intel Core or AMD Ryzen processors, ensuring smooth multitasking and reliable performance. With Full HD displays and anti-glare technology, they deliver vibrant visuals while reducing eye strain. The Slim series offers SSD storage for faster data access and boot times, and expandable memory options to suit your needs. Their lightweight and sleek designs make them highly portable, perfect for students and professionals. Additional features like Wi-Fi 6 connectivity, Dolby Audio, and backlit keyboards enhance the overall user experience.', 'upload/pic44.jpg', 79990, 8, 'accepted', 2, 'Electronics'),
(13, 'SAMSUNG Galaxy Book4', 'SAMSUNG Galaxy Book4 Metal Intel Core i5 13th Gen 1335U (16 GB/ 512 GB SSD/ Windows 11 Home)', 'The Samsung Galaxy Book 4 is a sleek and powerful laptop designed for seamless multitasking and entertainment. Encased in a lightweight full-metal body, it weighs just 1.55 kg, making it highly portable. Featuring a 15.6-inch Full HD display, it delivers vibrant visuals for work and play. Powered by the latest Intel Core processors and integrated Intel graphics, it ensures smooth performance for streaming, gaming, and productivity. With up to 512GB SSD storage, expandable to 2TB, you\'ll have ample space for all your files. The Galaxy Book 4 also boasts Dolby Atmos-tuned dual speakers for immersive sound, a variety of built-in ports for connectivity, and a reliable battery with fast charging capabilities. Perfect for professionals and students alike, this laptop combines style, functionality, and cutting-edge technology2.', 'upload/img13.jpg', 60990, 7, 'accepted', 3, 'Electronics'),
(14, 'SAMSUNG M35 5G', '(Moonlight Blue,128 GB) (6 GB RAM) ', 'The Samsung Galaxy M35 5G is a feature-packed smartphone designed for performance and durability. It boasts a 6.6-inch Infinity-O display with a high refresh rate of 120 Hz and brightness up to 1000 nits, ensuring vibrant visuals even in bright conditions. Powered by an Exynos processor and equipped with 6GB RAM and 128GB storage, it delivers smooth multitasking and ample space for your apps and media3. The 6000mAh battery supports 25W fast charging, keeping you connected throughout the day3. Its camera setup includes a 50MP main camera, 8MP ultra-wide camera, 2MP macro camera, and a 13MP selfie camera, perfect for capturing stunning photos and videos3. With Gorilla Glass Victus+ for durability and a vapor cooling chamber for heat dissipation, the Galaxy M35 5G is built to last.', 'upload/img14.jpg', 23499, 20, 'accepted', 3, 'Mobiles'),
(15, 'SAMSUNG 322 L Refrigerator', 'SAMSUNG 322L Froast Free Double Door 2 Star Convertible Refrigerator', 'The Samsung 322L Frost-Free Double Door Refrigerator is a versatile and energy-efficient appliance, perfect for families of 3-5 members. It features a Convertible 5-in-1 mode, allowing you to optimize storage based on your needs, whether it\'s extra fridge space or vacation mode. Equipped with Twin Cooling Plus technology, it ensures independent cooling for the fridge and freezer, keeping your food fresh for longer. The Digital Inverter Compressor provides energy efficiency, less noise, and long-lasting performance. With a sleek design and toughened glass shelves, it combines style with durability. This refrigerator is a reliable choice for modern households.', 'upload/img10.jpg', 45900, 18, 'accepted', 3, 'Home & Kitchen'),
(16, 'SAMSUNG AC', 'SAMSUNG 2025 Model 5 Step Convertible 1 Ton 3 Star Split Inverter with Powerful cooling & Energy Saving, expandable AC ', 'Samsung air conditioners are designed to provide efficient cooling and advanced features for modern homes. With AI-driven technologies, they optimize energy consumption and cooling performance, offering up to 30% additional energy savings. The 5-step Convertible Cooling allows you to adjust compressor operation based on your needs, while the Digital Inverter Compressor ensures quiet and efficient operation. Many models come with Wi-Fi and voice control compatibility, enabling remote operation through apps like SmartThings or voice assistants like Alexa and Google Assistant. Features like 4-way swing, anti-bacterial filters, and auto-clean functions enhance comfort and hygiene, making Samsung ACs a reliable choice for your cooling needs.', 'upload/img11.jpg', 42999, 12, 'accepted', 3, 'Home & Kitchen'),
(17, 'NYKAA Matte Lipstick', 'NYKAA So Creame! Creamy Matte Lipstick - Gossip Dose (maroon, 4g) ', 'Nykaa Matte Lipsticks are a perfect blend of style and comfort, offering a long-lasting matte finish that feels lightweight on the lips. Enriched with vitamin E, they provide nourishment while delivering intense color payoff in just one stroke. The creamy formula ensures smooth application and a non-drying texture, making them ideal for all-day wear. Available in a wide range of shades, Nykaa Matte Lipsticks cater to every mood and occasion, from bold reds to subtle nudes. Whether you\'re heading to a party or a casual outing, these lipsticks are your go-to for a flawless look.', 'upload/img22.jpg', 330, 23, 'accepted', 7, 'Beauty & Personal Care'),
(18, 'NYKAA Matte Foundation', 'NYKAA SkinShield Anti-Pollution Matte Foundation- Frisky Creme - 03 Foundation (Frisky Creme, 30ml)', 'Nykaa Matte Foundation is designed to provide a flawless, long-lasting matte finish while caring for your skin. The SkinShield Anti-Pollution Matte Foundation offers triple active action to guard against dust and micro-particles, minimize pores, and mattify your complexion. It is available in 15 shades, specially curated for Indian skin tones. The formula is lightweight and blends seamlessly, ensuring a natural look that lasts all day. Perfect for everyday wear, it combines beauty with skincare benefits.', 'upload/img21.jpg', 602, 20, 'accepted', 7, 'Beauty & Personal Care'),
(19, 'NYKAA Eyeshadow', 'NYKAA Cosmetics 4 In 1 Quad Eyshadow Palette - Wine & Dine + Blendpro Eyeshadow Blending Makeup Brush ', 'Nykaa Eye Shadows are perfect for creating stunning eye looks, whether you\'re going for a subtle daytime charm or a bold evening statement. The Eyes On Me! 10-in-1 Eyeshadow Palette offers a mix of velvety mattes, shimmering metallics, and soft satins, ensuring versatility for every occasion. For on-the-go glam, the 4-in-1 Quad Eyeshadow Palette provides ultra-pigmented shades that are easy to blend and long-lasting.', 'upload/img20.jpg', 650, 15, 'accepted', 7, 'Beauty & Personal Care'),
(20, 'NYKAA Body Lotion', 'NYKAA Wanderlust Body Lotion - Country Rose (300 ml)', 'Nykaa Wanderlust Body Lotions are crafted to transport you to exotic destinations with their luxurious fragrances and nourishing formulas. Enriched with natural ingredients, these lotions provide intense hydration and leave your skin feeling soft and smooth. The lightweight, non-greasy formula ensures quick absorption, making it perfect for daily use. With a variety of scents inspired by places like Sicilian Sweet Pea, French Lavender, and Japanese Cherry Blossom, these lotions are a treat for your senses and your skin.', 'upload/img19.jpg', 400, 18, 'accepted', 7, 'Beauty & Personal Care'),
(22, 'Clemmie Dress', 'Clemmie Dress Wool Crepe Eucalyptus - UK Size 12', 'The Clemmie Dress in Wool Crepe Eucalyptus is a stunning piece of occasionwear that combines elegance with modern sophistication. Crafted from lightweight Italian wool crepe, it features a fixed wrap design and slim bell sleeves, adding a touch of subtle drama. Fully lined in silk, this dress offers luxurious comfort and a flattering fit. The beautiful eucalyptus green color complements all skin tones, making it an ideal choice for special events. Falling to a midi length, it includes an invisible center-back zip for easy wear. Perfect for those seeking timeless style with a contemporary twist.', 'upload/img18.jpg', 1299, 10, 'accepted', 10, 'Fashion'),
(23, 'Womens Trousers', 'Wide Leg Cream Trousers, Old Money Style ', 'Wide-leg cream trousers in the \"Old Money\" style exude timeless elegance and sophistication. Crafted from premium fabrics, these trousers feature a high-waisted design that enhances your silhouette and provides a flattering fit. The wide-leg cut offers both comfort and a chic aesthetic, making them versatile for formal and casual occasions. With subtle pleats and a tailored finish, they embody the understated luxury associated with the \"Old Money\" fashion tradition. Perfect for pairing with blazers, silk blouses, or knitwear, these trousers are a wardrobe staple for those who appreciate refined style.', 'upload/img17.jpg', 999, 9, 'accepted', 10, 'Fashion'),
(24, 'Mens Shirt ', 'Men Striped Shirt Lapel Long Sleeve Button Loose Streetwear Casual Men Clothing Korean Style Fashion Shirts INCERUN S-5XL - XXXL / Brown', 'The INCERUN Men\'s Striped Shirt in Brown is a stylish and versatile piece of casual streetwear inspired by Korean fashion. Designed with a lapel collar and long sleeves, it offers a relaxed and loose fit for maximum comfort. Made from high-quality fabric, this shirt is breathable and durable, making it ideal for everyday wear. Available in sizes ranging from S to 5XL, it caters to a wide range of body types. Perfect for pairing with jeans or trousers, this shirt is a must-have for those who appreciate effortless style and modern trends.', 'upload/img16.jpg', 899, 12, 'accepted', 10, 'Fashion'),
(25, 'Mens Long Sleeve Shirt', 'Patchwork Cotton Long Sleeve Mens Shirt Lapel Loose Square- Neck Shirt Jackets', 'Patchwork Cotton Long Sleeve Men\'s Shirts are a stylish blend of comfort and modern design. Featuring a lapel collar and a square-neck style, these shirts offer a unique and relaxed fit. Made from high-quality cotton, they are breathable and durable, perfect for casual outings or layering as a jacket. The patchwork design adds a touch of creativity and individuality, making them stand out in any wardrobe. Ideal for pairing with jeans or chinos, these shirts are versatile and trendy, catering to those who appreciate effortless style.', 'upload/img15.jpg', 1200, 10, 'accepted', 10, 'Fashion'),
(26, 'Ashirvadh Atta', 'Ashirvadh 100 % Natural, Healthy & Tasty Ashirvadh Atta with Glutten & Preservative Free (10 Kg)', 'Aashirvaad Atta is a premium whole wheat flour known for its quality and nutritional benefits. It is made from 100% pure wheat, sourced from select regions in India, ensuring the grains are sun-kissed and showered with just the right amount of rain. The flour is processed using the traditional \'chakki\' method, which helps retain the natural dietary fibers and nutrients of the wheat', 'upload/Ashirvaad Atta.jpg', 579, 25, 'accepted', 9, 'Grocery'),
(27, 'Brown Rice', 'Daawat Brown Basmati Rice (1 Kg)', 'Daawat Brown Rice is a premium-quality brown basmati rice known for its health benefits and quick cooking time. It undergoes a unique Hydration Enhancement Technology (HET) that retains the full bran layer, ensuring the rice is rich in fiber, vitamins, and minerals. This process also makes it easier to cook, with a preparation time of just 15 minutes. Unlike many other brown rice options, Daawat Brown Rice stays fresh for up to 24 months, thanks to a special technique that prevents rancidity.', 'upload/pic 40.jpg', 202, 20, 'accepted', 9, 'Grocery'),
(28, 'Nescafe Coffee Powder', 'Nescafe Classic Stabilo, 200g Pouch Instant Coffee', 'Nescafé Classic Stabilo is a popular instant coffee product that offers a rich and aromatic coffee experience. Made from 100% pure coffee beans, it is medium-roasted to bring out the perfect balance of flavor and aroma. The Stabilo pack is designed for convenience, ensuring the coffee stays fresh and easy to store. It\'s ideal for those who enjoy a quick and satisfying cup of coffee, whether at home or on the go.', 'upload/pic41.jpg', 729, 18, 'accepted', 9, 'Grocery'),
(29, 'FORTUNE Soya Oil', 'FORTUNE Soya Health Refined Soyabean Oil Pouch (870 g)', 'Fortune Soya Health Soya Oil is a refined soybean oil designed to provide a healthy cooking option for your family. It is fortified with essential vitamins like Vitamin A and D, which support overall health. This oil is rich in Omega-3 fatty acids, known for promoting heart health, and contains PUFA (Polyunsaturated Fatty Acids), which help in reducing cholesterol levels. Additionally, it is light, odorless, and enhances the natural flavors of your dishes.', 'upload/pic43.jpg', 160, 15, 'accepted', 9, 'Grocery'),
(30, 'Crocs ', 'Crocs unisex-adult Bayaband Clog', 'Crocs are known for their lightweight, comfortable, and durable footwear, designed for all-day wear. They come in a variety of styles, including clogs, sandals, and slides, catering to men, women, and kids. Crocs are made from a proprietary material called Croslite™, which provides cushioning and support.', 'upload/pic50.jpg', 1999, 29, 'accepted', 14, 'Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` varchar(1000) NOT NULL,
  `u_number` bigint(20) NOT NULL,
  `u_address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_password`, `u_number`, `u_address`) VALUES
(1, 'Dhanya', 'dhanyashetty@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 9876453789, 'talapady');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `v_id` int(11) NOT NULL,
  `v_name` varchar(100) NOT NULL,
  `v_email` varchar(100) NOT NULL,
  `v_password` varchar(1000) NOT NULL,
  `v_status` varchar(100) NOT NULL DEFAULT 'new',
  `v_number` bigint(20) NOT NULL,
  `v_address` varchar(100) NOT NULL,
  `v_photo` varchar(1000) NOT NULL DEFAULT 'photo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`v_id`, `v_name`, `v_email`, `v_password`, `v_status`, `v_number`, `v_address`, `v_photo`) VALUES
(1, 'Harsha', 'harsha@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'accepted', 9863456734, 'Mangalore', 'upload/vqr1.jpg'),
(2, 'Poorvika', 'poorvika@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'rejected', 9987766234, 'Mangalore', 'upload/vqr1.jpg'),
(3, 'Samsung', 'samsung@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'accepted', 9845634563, 'Mangalore', 'upload/vqr1.jpg'),
(4, 'Sangeetha', 'sangeetha@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'rejected', 9667786990, 'Mangalore', 'upload/vqr1.jpg'),
(5, 'MapleX', 'maplex@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'rejected', 9123123658, 'Mangalore', 'upload/vqr1.jpg'),
(6, 'MAX', 'max@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'rejected', 9878987342, 'Mangalore', 'upload/vqr1.jpg'),
(7, 'NYKAA', 'nykaa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'accepted', 6345678234, 'Mangalore', 'upload/vqr1.jpg'),
(8, 'PUMA', 'puma@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'accepted', 9823654967, 'Mangalore', 'upload/vqr1.jpg'),
(9, 'DMART', 'dmart@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'accepted', 8790065043, 'Mangalore', 'upload/vqr1.jpg'),
(10, 'Style Union', 'styleunion@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'accepted', 7689572318, 'Mangalore', 'upload/vqr1.jpg'),
(11, 'MAMA Earth', 'mamaearth@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'accepted', 7909087953, 'Mangalore', 'upload/vqr1.jpg'),
(12, '@HOME', 'home@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'accepted', 8974520943, 'Mangalore', 'upload/vqr1.jpg'),
(13, 'ZUDIO', 'zudio@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'accepted', 8769073217, 'Mangalore', 'upload/vqr1.jpg'),
(14, 'CROCS', 'crocs@gmail.com', '7e5045e0e87a53749ea98554167adea9', 'accepted', 9845673789, 'Mangalore', 'upload/vqr1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
