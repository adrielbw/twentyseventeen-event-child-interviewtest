<?php
/* Template Name: Event Page
Template Post Type: page
*/

get_header();
?>

<?php
$events = [
    [
        "event_name" => "Lomba Basket",
        "event_date" => "2025-01-23",
        "event_location" => "Semarang",
        "event_price" => 45000
    ],
    [
        "event_name" => "Turnamen Mobile Legend",
        "event_date" => "2024-03-15",
        "event_location" => "Bandung",
        "event_price" => 100000
    ],
    [
        "event_name" => "Festival Lampion",
        "event_date" => "2023-06-24",
        "event_location" => "Mojokerto",
        "event_price" => 200000
    ],
];

//sorting
if (isset($_GET['sort'])) {
    if ($_GET['sort'] == 'low-high') {
        usort($events, fn($a, $b) => $a['event_price'] <=> $b['event_price']);
    }
    if ($_GET['sort'] == 'high-low') {
        usort($events, fn($a, $b) => $b['event_price'] <=> $a['event_price']);
    }
}
?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div id="event-content" class="event-page-wrapper">
                <h1><?php the_title(); ?></h1>
                
                <p>Ini adalah custom event page di Wordpress yang ada tiga data dummy event dan dilengkapi dengan fitur sorting.</p>
                
                <form method="GET" action="<?php the_permalink(); ?>#event-content" class="sorting-form">
                    <select name="sort" onchange="this.form.submit()" class="sort-dropdown">
                        <option value="">Sort by Price</option>
                        <option value="low-high" <?php if(isset($_GET['sort']) && $_GET['sort']=="low-high") echo "selected"; ?>>Murah → Mahal</option>
                        <option value="high-low" <?php if(isset($_GET['sort']) && $_GET['sort']=="high-low") echo "selected"; ?>>Mahal → Murah</option>
                    </select>
                </form>

                <div class="event-container">
                    <?php foreach ($events as $event): ?>
                        <div class="event-card">
                            
                            <div class="event-picture-placeholder">
                                Picture
                            </div>

                            <h3 class="event-title"><?= $event['event_name'] ?></h3>
                            <p class="event-detail"><strong>Date:</strong> <?= $event['event_date'] ?></p>
                            <p class="event-detail"><strong>Location:</strong> <?= $event['event_location'] ?></p>
                            <p class="event-detail"><strong>Price:</strong> Rp <?= number_format($event['event_price']) ?></p>
                            
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="event-count-display">
                    <strong><?php echo do_shortcode('[simple_event_count]'); ?></strong>
                </div>
            </div>
        </main>
    </div>
</div>
<?php
get_footer();
?>