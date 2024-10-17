<?php
include 'C:\xampp\htdocs\CosmicWonders\BackEnd\config.php';

try {

    $sql = "INSERT INTO event (Event_title, Event_sub_text, Img_url, isDelete, Category_ID) VALUES 
    ('Black Holes', 'Explore the mysteries of black holes and the monumental forces that shape the universe as we know it.', 'hoden.webp', 'N', 2), 
    ('Cosmic History', 'Explore the origins of the universe and the monumental event that sparked the creation of everything we know today.', 'bb-bg.webp', 'N', 2);";
    $conn->exec($sql);

    $events = [
        [
            'Event_detail_title' => 'What is a Black Hole?',
            'Event_detail_sub_text' => 'A black hole is a region in space where the gravitational pull is so strong that nothing, not even light, can escape from it. Black holes are formed from the remnants of massive stars that have collapsed under their own gravity after a supernova explosion.',
            'Event_detail_img' => '',
            'Event_ID' => '1',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Event_detail_title' => 'How are Black Holes Formed?',
            'Event_detail_sub_text' => 'Black holes are formed when massive stars collapse at the end of their life cycle. When a star uses up all its nuclear fuel, it can no longer support itself against its own gravitational force, resulting in a collapse that creates a singularity, the core of a black hole.	',
            'Event_detail_img' => '',
            'Event_ID' => '1',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Event_detail_title' => 'The Event Horizon: Point of No Return',
            'Event_detail_sub_text' => 'The event horizon is the boundary around a black hole where the escape velocity exceeds the speed of light. Once an object crosses this boundary, it is inevitably pulled into the black hole.',
            'Event_detail_img' => '',
            'Event_ID' => '1',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Event_detail_title' => 'Spaghettification: The Strange Fate of Objects Falling into Black Holes',
            'Event_detail_sub_text' => 'Due to the immense gravitational forces near black holes, any object that falls into one would experience a stretching effect called spaghettification. The object would be stretched thin as it approaches the singularity.',
            'Event_detail_img' => 'so5.jpg',
            'Event_ID' => '1',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Event_detail_title' => 'The First Image of a Black Hole',
            'Event_detail_sub_text' => 'In 2019, scientists released the first-ever image of a black hole, located in the galaxy M87. This was a groundbreaking achievement, showcasing the black hole’s shadow and the glowing ring of gas and dust around it.',
            'Event_detail_img' => 'so8.jpg',
            'Event_ID' => '1',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Event_detail_title' => 'The Universe’s History',
            'Event_detail_sub_text' => 'The origin, evolution, and nature of the universe have fascinated and confounded humankind for centuries. New ideas and major discoveries made during the 20th century transformed cosmology – the term for the way we conceptualize and study the universe – although much remains unknown. Here is the history of the universe according to cosmologists’ current theories.',
            'Event_detail_img' => '',
            'Event_ID' => '2',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Event_detail_title' => 'Cosmic Inflation',
            'Event_detail_sub_text' => 'Around 13.8 billion years ago, the universe expanded faster than the speed of light for a fraction of a second, a period called cosmic inflation. Scientists aren’t sure what came before inflation or what powered it. It’s possible that energy during this period was just part of the fabric of space-time. Cosmologists think inflation explains many aspects of the universe we observe today, like its flatness, or lack of curvature, on the largest scales. Inflation may have also magnified density differences that naturally occur on space’s smallest, quantum-level scales, which eventually helped form the universe’s large-scale structures.',
            'Event_detail_img' => '',
            'Event_ID' => '2',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Event_detail_title' => 'Big Bang and Nucleosynthesis',
            'Event_detail_sub_text' => 'When cosmic inflation stopped, the energy driving it transferred to matter and light – the big bang. One second after the big bang, the universe consisted of an extremely hot (18 billion degrees Fahrenheit or 10 billion degrees Celsius) primordial soup of light and  particles. In the following minutes, an era called nucleosynthesis, protons and neutrons collided and produced the earliest elements – hydrogen, helium, and traces of lithium and beryllium. After five minutes, most of today’s helium had formed, and the universe had expanded and cooled enough that further element formation stopped. At this point, though, the universe was still too hot for the atomic nuclei of these elements to catch electrons and form complete atoms. The cosmos was opaque because a vast number of electrons created a sort of fog that scattered light.',
            'Event_detail_img' => '',
            'Event_ID' => '2',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Event_detail_title' => 'Recombination',
            'Event_detail_sub_text' => 'Around 380,000 years after the big bang, the universe had cooled enough that atomic nuclei could capture electrons, a period astronomers call the epoch of recombination. This had two major effects on the cosmos. First, with most electrons now bound into atoms, there were no longer enough free ones to completely scatter light, and the cosmic fog cleared. The universe became transparent, and for the first time, light could freely travel over great distances. Second, the formation of these first atoms produced its own light. This glow, still detectable today, is called the cosmic microwave background. It is the oldest light we can observe in the universe.',
            'Event_detail_img' => '',
            'Event_ID' => '2',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'Event_detail_title' => 'Dark Ages',
            'Event_detail_sub_text' => 'After the cosmic microwave background, the universe again became opaque at shorter wavelengths due to the absorbing effects of all those hydrogen atoms. For the next 200 million years the universe remained dark. There were no stars to shine. The cosmos at this point consisted of a sea of hydrogen atoms, helium, and trace amounts of heavier elements.',
            'Event_detail_img' => '',
            'Event_ID' => '2',
            'isDelete' => 'N',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],

    ];

    // Tiến hành chèn dữ liệu vào cơ sở dữ liệu
    $values = [];
    $placeholders = [];

    // Tạo chuỗi các giá trị và placeholders cho từng bản ghi
    foreach ($events as $record) {
        $placeholders[] = "(?, ?, ?, ?, ?, ?, ?)";
        $values[] = $record['Event_detail_title'];
        $values[] = $record['Event_detail_sub_text'];
        $values[] = $record['Event_ID'];
        $values[] = $record['Event_detail_img'];
        $values[] = $record['isDelete'];
        $values[] = $record['created_at'];
        $values[] = $record['updated_at'];
    }

    // Tạo câu lệnh SQL
    $sql = "INSERT INTO event_detail (Event_detail_title, Event_detail_sub_text, Event_ID, Event_detail_img, isDelete, created_at, updated_at) VALUES " . implode(", ", $placeholders);

    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($sql);

    // Thực thi câu lệnh với giá trị
    $stmt->execute($values);

    echo "success!";
} catch (Exception $e) {
    echo "Error inserting sample data: " . $e->getMessage();
}

$conn = null;
