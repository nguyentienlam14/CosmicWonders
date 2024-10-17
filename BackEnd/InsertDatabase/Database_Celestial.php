<?php
include 'C:\xampp\htdocs\CosmicWonders\BackEnd\config.php';

try {

    $sql = "INSERT INTO Celestial (Celestial_type, Category_ID, isDelete) VALUES ('Planet', 3, 'N') , ('Star', 3, 'N');";
    $conn->exec($sql);
    $data = [
        [
            'Celestial_detail_ID' => 1,
            'Celestial_detail_title' => 'Mercury',
            'Celestial_detail_sub' => 'Mercury is the smallest planet in the Solar System and the closest planet to the Sun. Its surface is battered by numerous impact craters due to the lack of an atmosphere to protect it from meteoroids. With a diameter of only 38% of Earth, Mercury has a barren surface and a dry, desolate terrain.',
            'Other_details' => 'Due to its proximity to the Sun, temperatures on Mercury fluctuate dramatically between day and night. During the day, temperatures can reach up to 430°C, but at night, they can drop to -180°C. Mercury does not have a thick atmosphere to retain heat, causing this significant temperature difference. Its surface bears many traces of meteoroid impacts from billions of years ago.',
            'Celestial_discovery_date' => 'Mercury has been known since ancient times. Greek astronomers, Babylonians, and many other civilizations observed this planet long before modern instruments were available.',
            'Celestial_size' => 'Its diameter is approximately 4,879 km, just slightly larger than Earth’s Moon.',
            'Celestial_ozone' => 'There is no ozone layer on Mercury due to its very thin atmosphere, which mainly consists of hydrogen, helium, and a small amount of oxygen.',
            'Celestial_distance_s_e' => 'The average distance is about 57.9 million km (0.39 AU).',
            'Celestial_ID' => 2,
            'Celestial_detail_img' => 'mercury.webp',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Celestial_detail_ID' => 2,
            'Celestial_detail_title' => 'Venus',
            'Celestial_detail_sub' => 'Venus is the second planet from the Sun and has a thick atmosphere with extremely high pressure, about 90 times that of Earth. Surface temperatures on Venus are extremely high, typically maintaining around 475°C, hotter than Mercury despite being further from the Sun.',
            'Other_details' => 'Venus’s atmosphere is primarily composed of CO2 with sulfuric acid clouds, creating a powerful greenhouse effect that traps heat and keeps its surface at extreme temperatures. Due to this atmosphere, Venus can reflect up to 70% of sunlight from the Sun, making it the brightest object in the night sky after the Moon.',
            'Celestial_discovery_date' => 'Like Mercury, Venus has been observed since ancient times. Greek astronomers named Venus "Hesperus" when it appeared in the evening and "Phosphorus" when it appeared in the morning.',
            'Celestial_size' => 'The diameter of Venus is about 12,104 km, nearly the same size as Earth.',
            'Celestial_ozone' => 'There is no ozone layer on Venus because its atmosphere is mainly composed of CO2 and lacks the necessary components to form an ozone layer.',
            'Celestial_distance_s_e' => 'The average distance is about 108.2 million km (0.72 AU).',
            'Celestial_ID' => 2,
            'Celestial_detail_img' => 'Venus.webp',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Celestial_detail_ID' => 3,
            'Celestial_detail_title' => 'Earth',
            'Celestial_detail_sub' => 'Earth is the third planet from the Sun and the only planet known to support life. With over 70% of its surface covered by water, Earth has ideal conditions to sustain various forms of life, from tiny marine organisms to complex animals.',
            'Other_details' => 'Earth has a thick atmosphere composed mainly of nitrogen (78%) and oxygen (21%), along with other gases such as CO2 and argon. This atmosphere not only provides oxygen but also creates a mild greenhouse effect to maintain suitable temperatures for life. Additionally, Earth has a rich ecosystem and the development of life has produced an atmospheric layer that protects against ultraviolet rays, thanks to the ozone layer.',
            'Celestial_discovery_date' => '(Not applicable, as we have known about this planet for a long time and live on it).',
            'Celestial_size' => 'The diameter of Earth is about 12,742 km.',
            'Celestial_ozone' => 'Earth has an ozone layer that plays a protective role against harmful UV rays from the Sun.',
            'Celestial_distance_s_e' => 'The average distance is about 149.6 million km (1 AU).',
            'Celestial_ID' => 2,
            'Celestial_detail_img' => 'Traidat.jpg',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Celestial_detail_ID' => 4,
            'Celestial_detail_title' => 'Mars',
            'Celestial_detail_sub' => 'Mars is the fourth planet from the Sun, famous for its reddish surface due to the presence of iron oxide (rust). It is a primary target for studies regarding the potential for extraterrestrial life.',
            'Other_details' => "Mars has a very thin atmosphere, only about 1% of Earth's atmospheric pressure, primarily composed of CO2. This planet experiences cold winters with thick polar ice and summers that can partially melt the ice, creating temporary water flows. Many exploratory missions, such as NASA's Curiosity, have found traces of liquid water and organic compounds on its surface, opening up prospects for microbial life in the past.",
            'Celestial_discovery_date' => "Mars has been observed since ancient times and was particularly noted by ancient Greek and Roman civilizations, who named it 'Mars' after the god of war.",
            'Celestial_size' => 'The diameter of Mars is approximately 6,779 km, about half the size of Earth.',
            'Celestial_ozone' => 'There is no ozone layer on Mars. Its atmosphere is too thin to create such a protective layer.',
            'Celestial_distance_s_e' => 'The average distance is about 227.9 million km (1.52 AU).',
            'Celestial_ID' => 2,
            'Celestial_detail_img' => 'sao-hoa.jpg',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Celestial_detail_ID' => 5,
            'Celestial_detail_title' => 'Jupiter',
            'Celestial_detail_sub' => 'Jupiter is the largest planet in the Solar System, with a volume more than 1,300 times that of Earth. It is known for the Great Red Spot—a massive storm that has existed for hundreds of years, with a diameter three times that of Earth. Jupiter is the fifth planet from the Sun and is considered a gas giant.',
            'Other_details' => "Jupiter’s atmosphere is primarily composed of hydrogen (about 90%) and helium (about 10%), with swirling cloud bands that create colorful stripes on its surface. Its cloud layers contain compounds such as ammonia and methane, contributing to its varied colors. Jupiter has a very strong magnetic field, about 20,000 times stronger than Earth's, protecting its moons from solar winds. Additionally, Jupiter has over 90 natural satellites, the most notable of which are the four Galilean moons: Io, Europa, Ganymede, and Callisto.",
            'Celestial_discovery_date' => 'Jupiter has been observed since ancient times, but the first detailed observations were made by Galileo Galilei in 1610 when he discovered its four largest moons.',
            'Celestial_size' => 'The diameter of Jupiter is about 139,820 km, the largest in the Solar System.',
            'Celestial_ozone' => 'There is no ozone layer on Jupiter. Its atmosphere is too thick and primarily contains light gases like hydrogen and helium.',
            'Celestial_distance_s_e' => 'The average distance is about 778.5 million km (5.2 AU).',
            'Celestial_ID' => 2,
            'Celestial_detail_img' => 'jupiter.webp',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Celestial_detail_ID' => 6,
            'Celestial_detail_title' => 'Saturn',
            'Celestial_detail_sub' => "Saturn is the sixth planet from the Sun, famous for its stunning ring system. Saturn's rings are composed of billions of ice and rock particles, ranging in size from tiny dust grains to large boulders the size of mountains.",
            'Other_details' => 'Saturn is also a gas giant, with an atmosphere primarily made up of hydrogen and helium, similar to Jupiter. Methane and ammonia in its atmosphere create light-colored cloud formations. Its ring system is complex, consisting of many different rings, each only a few tens of meters thick despite stretching hundreds of thousands of kilometers wide. Saturn has over 80 natural satellites, the most notable of which is Titan—the second-largest moon in the Solar System, featuring a thick atmosphere and lakes of liquid methane.',
            'Celestial_discovery_date' => "Saturn has been known since ancient times, but its rings were only clearly observed when Galileo Galilei used a telescope in 1610. However, he did not understand what they were, and it wasn't until the 17th century that astronomer Huygens identified them as rings surrounding Saturn.",
            'Celestial_size' => 'The diameter of Saturn is approximately 116,460 km, the second-largest in the Solar System.',
            'Celestial_ozone' => 'There is no ozone layer on Saturn. Its atmosphere is primarily hydrogen and helium, lacking the necessary components to form an ozone layer.',
            'Celestial_distance_s_e' => 'The average distance is about 1.43 billion km (9.58 AU).',
            'Celestial_ID' => 2,
            'Celestial_detail_img' => 'Saturn.jpg',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Celestial_detail_ID' => 7,
            'Celestial_detail_title' => 'Uranus',
            'Celestial_detail_sub' => "Uranus is the seventh planet from the Sun and is notable for its nearly horizontal rotation axis, which creates a unique spinning motion. This causes the planet's poles to alternate facing the Sun throughout its orbit.",
            'Other_details' => "Uranus's atmosphere is primarily composed of hydrogen, helium, and a small amount of methane, giving it a distinct pale blue color. The planet's unusual tilt (about 98 degrees) may result from a collision with a large object in the past. Uranus also has faint rings and 27 known moons, with Titania and Oberon being the largest.",
            'Celestial_discovery_date' => 'Uranus was discovered by British astronomer William Herschel in 1781. It was the first planet discovered through the use of a telescope, marking a turning point in the understanding of the Solar System.',
            'Celestial_size' => 'Uranus was discovered by British astronomer William Herschel in 1781. It was the first planet discovered through the use of a telescope, marking a turning point in the understanding of the Solar System.',
            'Celestial_ozone' => 'There is no ozone layer on Uranus. Its atmosphere primarily contains methane, which is insufficient to form an ozone layer.',
            'Celestial_distance_s_e' => 'The average distance is about 2.87 billion km (19.22 AU).',
            'Celestial_ID' => 2,
            'Celestial_detail_img' => 'urunus.jpg',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Celestial_detail_ID' => 8,
            'Celestial_detail_title' => 'Neptune',
            'Celestial_detail_sub' => 'Neptune is the eighth and farthest planet from the Sun in the Solar System. With its deep blue color, this planet is known for having the strongest winds recorded in the Solar System, reaching speeds of up to 2,100 km/h.',
            'Other_details' => "Neptune's atmosphere is primarily composed of hydrogen, helium, and methane, similar to Uranus but with a larger amount of methane, giving it a darker blue hue. This planet has a stormy atmosphere with large storms that can appear and disappear within a short time frame. Neptune also has faint rings and 14 known moons, the largest of which is Triton, which is geologically active and has geysers of nitrogen gas.",
            'Celestial_discovery_date' => "Neptune was discovered in 1846 by astronomers Johann Galle and Heinrich d'Arrest based on predictions made by Urbain Le Verrier. It was the first planet discovered through mathematical predictions rather than direct observation.",
            'Celestial_size' => 'The diameter of Neptune is approximately 49,244 km.',
            'Celestial_ozone' => 'There is no ozone layer on Neptune, similar to Uranus. Its atmosphere primarily consists of hydrogen, helium, and methane.',
            'Celestial_distance_s_e' => 'The distance from Neptune to Earth is not fixed, as both planets move along their own orbits around the Sun. However, the average distance between Neptune and Earth is about 4.3 billion km.When  Neptune and Earth are at their closest positions in their orbits (opposite each other with the Sun in between), this distance can decrease to around 4.3 billion km. On the other hand, when they are at their farthest positions, the distance between the two planets can reach over 4.6 billion km.',
            'Celestial_ID' => 2,
            'Celestial_detail_img' => 'Neptune.jpg',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Celestial_detail_ID' => 9,
            'Celestial_detail_title' => 'The Sun',
            'Celestial_detail_sub' => 'The Sun is the only star in the Solar System, classified as a yellow dwarf star, providing the primary source of light and heat for Earth and the other planets. It not only generates life but also stabilizes the planetary system around it.',
            'Other_details' => 'The Sun is a G2V star, also known as a yellow dwarf, with relatively average mass and size compared to other stars in the universe. Composed mainly of hydrogen and helium, the Sun operates through nuclear fusion, where hydrogen is converted into helium, releasing vast amounts of energy in the form of light and heat. The Sun accounts for 99.86% of the total mass of the Solar System, highlighting its irreplaceable central role.

The Sun is approximately 4.6 billion years old and is expected to continue shining for about another 5 billion years before transitioning into a red giant phase. During this phase, it will expand and may engulf the inner planets, including Earth. Afterward, the Sun will shrink and become a white dwarf, concluding its life cycle.',
            'Celestial_discovery_date' => "The Sun has been observed and worshipped since ancient times, known in civilizations such as Egypt, Greece, and others. The Egyptians worshipped Ra, the Sun god, while the ancient Greeks called the Sun Helios. However, scientific studies of the Sun truly began in the 17th century when the astronomer Galileo Galilei used a telescope to observe sunspots and their cycles. These discoveries marked a turning point in understanding the Sun's structure and activity.",
            'Celestial_size' => 'The Sun has a diameter of approximately 1.39 million kilometers, making it about 109 times larger than Earth. In terms of mass, the Sun is 330,000 times heavier than our planet, making it a colossal star whose gravitational pull holds the planets in orbit.',
            'Celestial_ozone' => "The Sun does not have an ozone layer. The ozone layer is a feature of Earth's atmosphere, playing a crucial role in protecting life from harmful ultraviolet radiation from sunlight. The Sun, being a massive ball of burning plasma primarily composed of hydrogen and helium, does not have an atmosphere like planets and thus lacks an ozone layer to regulate radiation.",
            'Celestial_distance_s_e' => "The average distance from Earth to the Sun is about 149.6 million kilometers, a measurement known as one Astronomical Unit (AU). This distance is vital because it maintains a livable environment on Earth. If the Sun were closer or farther, Earth's climate could become unstable, and life as we know it would not be able to thrive.",
            'Celestial_ID' => 1,
            'Celestial_detail_img' => 'thesun.webp',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Celestial_detail_ID' => 10,
            'Celestial_detail_title' => 'Polaris',
            'Celestial_detail_sub' => 'Polaris is the North Star and the brightest star in Ursa Minor. Its consistent position in the sky has made it an important celestial marker for navigation throughout history.',
            'Other_details' => "Polaris is not just a single star but a triple star system, consisting of three stars: Polaris A, Polaris Ab, and Polaris B. Polaris A is the main star, a supergiant yellow-white star, approximately 2,500 times more luminous than our Sun. The two smaller stars, Polaris Ab and B, orbit around Polaris A, although they are much fainter.

Despite being known as the North Star today, Polaris's position in the sky will change over time due to the phenomenon of axial precession, which is the gradual shift in the orientation of Earth’s axis. In roughly 13,000 years, the star Vega will take over as the North Star, as the Earth’s axis will point toward it instead of Polaris.

Polaris has been known since ancient times, with its significance as a navigational aid recognized by many civilizations. However, more detailed studies of Polaris began during the Middle Ages, when astronomers started to appreciate its importance for navigation and its unique properties as a variable star.",
            'Celestial_discovery_date' => 'Although Polaris has been observed since antiquity, it has been studied more rigorously since the Middle Ages. Its significance as a guiding star was recognized by early navigators and astronomers, who used it to find their way during nighttime journeys.',
            'Celestial_size' => 'Polaris has an impressive diameter approximately 37.5 times that of the Sun, showcasing its immense size. This makes Polaris a supergiant star, classified as a Type F7, and it is significantly larger than our own Sun, which is classified as a G2V yellow dwarf star. Polaris’s mass is about 5.4 times that of the Sun, contributing to its extraordinary luminosity.',
            'Celestial_ozone' => 'Polaris, being a star, does not have an ozone layer. Ozone layers are found in the atmospheres of planets, particularly Earth, where they serve to protect living organisms from harmful ultraviolet radiation emitted by the Sun. Since Polaris is a gaseous body, it operates under entirely different principles than terrestrial atmospheres.',
            'Celestial_distance_s_e' => "Polaris is located approximately 433 light-years away from Earth. This vast distance means that the light we see from Polaris today actually left the star over four centuries ago. As a result, Polaris offers a glimpse into the past, allowing astronomers to study the star's properties and behavior based on the light that has traveled through space for so long.",
            'Celestial_ID' => 1,
            'Celestial_detail_img' => 'polaris.jpg',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Celestial_detail_ID' => 11,
            'Celestial_detail_title' => 'Canopus',
            'Celestial_detail_sub' => 'Canopus is the second brightest star in the night sky, situated within the constellation Carina. Its brilliance and distinct position make it a key celestial marker for observers in the Southern Hemisphere.',
            'Other_details' => 'Canopus serves as a crucial navigational guide for both astronomers and sailors due to its stable brightness and position. Its light has been used as a "benchmark" in many space missions, helping to calibrate instruments and guide spacecraft on their journeys through the cosmos. For inhabitants of the Southern Hemisphere, Canopus plays a similar role to that of Polaris in the Northern Hemisphere, providing a fixed point of reference in the night sky.

The star is approximately 10,000 times more luminous than our Sun, which makes it an excellent target for astronomical observation. Canopus is also part of the ancient lore of various cultures, symbolizing guidance and navigation. Its prominence in the sky has inspired countless stories and legends throughout history.',
            'Celestial_discovery_date' => "Canopus has been documented since ancient times, with references found in Egyptian and Greek texts. The Egyptians, who revered the stars for their agricultural calendars, recognized Canopus as an important celestial object. Greek astronomers also noted its brightness, and it was used for navigation by sailors in the Mediterranean. The star's significant historical presence reflects its importance in early astronomical studies.",
            'Celestial_size' => 'Canopus has an impressive diameter of approximately 71 times that of the Sun, showcasing its status as a giant star. This massive size contributes to its incredible brightness, making it one of the most luminous stars in our galaxy. Its mass is estimated to be about 8.5 times that of the Sun, indicating that it has evolved from a main-sequence star into its current yellow giant phase. This transition is a part of its life cycle, driven by nuclear fusion processes occurring in its core.',
            'Celestial_ozone' => 'As a star, Canopus does not possess an ozone layer. Ozone layers are characteristic of planetary atmospheres, particularly Earth, where they play a vital role in protecting life from harmful ultraviolet (UV) radiation. Stars, on the other hand, are massive bodies of hot plasma and do not have atmospheres in the same way planets do. Thus, Canopus operates under different principles than terrestrial bodies.',
            'Celestial_distance_s_e' => 'Canopus is located approximately 310 light-years away from Earth, which means the light we observe from this brilliant star today left it over three centuries ago. This distance places Canopus in the realm of stars that are relatively close in astronomical terms, allowing for detailed study and observation. Its brightness and proximity make it a popular target for amateur astronomers and stargazers around the world.',
            'Celestial_ID' => 1,
            'Celestial_detail_img' => 'Canopus.jpg',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Celestial_detail_ID' => 12,
            'Celestial_detail_title' => 'Altair',
            'Celestial_detail_sub' => 'Altair is a bright star located in the constellation Aquila, also known as the Eagle. It is notable for its rapid rotation and its position as one of the nearest stars to our planet.',
            'Other_details' => "Altair spins on its axis at an astonishing speed, completing a full rotation in just 10.4 hours. This rapid rotation causes the star to experience significant oblateness, leading to a flattened shape at its poles and a bulging equator. While most stars have a more uniform, spherical appearance, Altair’s rapid spin results in a unique and visually intriguing profile.

This star is part of a trio known as the Summer Triangle, along with Deneb in Cygnus and Vega in Lyra. Altair's brightness and position make it a key navigational marker in the summer sky, guiding both amateur and professional astronomers. Its luminosity, approximately 10 times that of the Sun, allows it to be easily distinguished in the night sky, even in urban areas where light pollution can obscure other celestial objects.",
            'Celestial_discovery_date' => 'Altair has been known since ancient times, with references found in various cultures. It has been a significant point of interest for astronomers for millennia. In Arabic, the name "Altair" means "the flying eagle," reflecting its position in the Aquila constellation. Its prominence in historical texts showcases its longstanding importance to navigation and astronomy.',
            'Celestial_size' => 'With a diameter of approximately 1.8 times that of the Sun, Altair is classified as an A-type main-sequence star (A7V). Its size and mass indicate a more energetic lifecycle than that of our Sun, with greater temperatures and luminosity. Altair is estimated to be around 1.2 times the mass of the Sun, contributing to its rapid rotation and brighter appearance.',
            'Celestial_ozone' => 'As a star, Altair does not possess an ozone layer. Ozone is a feature of planetary atmospheres, particularly Earth, where it serves as a protective barrier against harmful ultraviolet (UV) radiation. Stars like Altair are massive balls of plasma, primarily composed of hydrogen and helium, and do not have atmospheres in the same sense that planets do.',
            'Celestial_distance_s_e' => 'Altair is located approximately 16.7 light-years away from Earth, making it one of our closest stellar neighbors. This relatively short distance in cosmic terms allows for detailed observation and study. The light we see from Altair today left the star just over 16 years ago, providing a glimpse into its past and making it a popular target for astronomers looking to learn more about stellar processes.',
            'Celestial_ID' => 1,
            'Celestial_detail_img' => 'Altair.jpg',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Celestial_detail_ID' => 13,
            'Celestial_detail_title' => 'Rigel',
            'Celestial_detail_sub' => 'Rigel is a blue supergiant and the brightest star in the constellation Orion.',
            'Other_details' => "Rigel boasts a surface temperature of around 12,000 Kelvin, making it significantly hotter and more luminous than many other stars in the night sky. This intense heat contributes to its bright blue color, which is a hallmark of massive stars nearing the end of their life cycles. Rigel's brilliance has made it one of the most observed stars during winter months, drawing the attention of both amateur and professional astronomers alike.

Notably, Rigel is a binary star system, meaning it has a companion star orbiting it. The primary star, Rigel A, is the one most commonly observed, while Rigel B, a fainter blue star, is not easily visible to the naked eye. This duality adds to the complexity and intrigue surrounding Rigel, enhancing its status as a subject of study in the astronomical community.",
            'Celestial_discovery_date' => 'Rigel has been known since ancient times, with references to it found in historical star catalogs and texts from various cultures. It was significant to ancient navigators, serving as a guide in the night sky for countless generations. Its prominence in myths and legends around the world underscores its importance in human history and culture.',
            'Celestial_size' => "Rigel is a colossal star, with a diameter approximately 78 times that of our Sun. This immense size places it among the largest stars known to humanity. Rigel's mass is estimated to be around 17 times greater than that of the Sun, which contributes to its exceptional luminosity and rapid evolution through the various stages of stellar life.",
            'Celestial_ozone' => 'As a star, Rigel does not possess an ozone layer. Ozone layers are characteristic of planetary atmospheres, like that of Earth, where they provide protection from harmful ultraviolet (UV) radiation. Instead, Rigel consists of hot plasma and undergoes nuclear fusion, lacking the atmospheric features typical of planets.',
            'Celestial_distance_s_e' => "Rigel is located approximately 860 light-years away from Earth. This significant distance means that the light we observe from Rigel today left the star over eight centuries ago. Despite this distance, Rigel's incredible brightness ensures that it remains visible to the naked eye, even in light-polluted urban environments.",
            'Celestial_ID' => 1,
            'Celestial_detail_img' => 'rigel.jpg',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],

    ];


    // Tạo mảng để lưu giá trị
    $values = [];
    $placeholders = [];

    // Tạo chuỗi các giá trị và placeholders cho từng bản ghi
    foreach ($data as $record) {
        $placeholders[] = "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $values[] = $record['Celestial_detail_ID'];
        $values[] = $record['Celestial_detail_title'];
        $values[] = $record['Celestial_detail_sub'];
        $values[] = $record['Other_details'];
        $values[] = $record['Celestial_discovery_date'];
        $values[] = $record['Celestial_size'];
        $values[] = $record['Celestial_ozone'];
        $values[] = $record['Celestial_distance_s_e'];
        $values[] = $record['Celestial_ID'];
        $values[] = $record['Celestial_detail_img'];
        $values[] = $record['isDelete'];
        $values[] = $record['created_at'];
        $values[] = $record['updated_at'];
    }

    // Tạo câu lệnh SQL
    $sql = "INSERT INTO celestial_detail (Celestial_detail_ID, Celestial_detail_title, Celestial_detail_sub, Other_details, Celestial_discovery_date, Celestial_size, Celestial_ozone, Celestial_distance_s_e, Celestial_ID, Celestial_detail_img, isDelete, created_at, updated_at) VALUES " . implode(", ", $placeholders);

    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($sql);

    // Thực thi câu lệnh với giá trị
    $stmt->execute($values);

    echo "success!";
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;
