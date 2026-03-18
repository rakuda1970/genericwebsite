<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductMetaSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Format: [item_serial, keywords (comma-separated), meta_description (≤160 chars)]
        $rows = [

            // ── Adidas ────────────────────────────────────────────────────────────
            [1001, 'adidas t-shirt, promotional t-shirt, custom apparel, polyester shirt, branded clothing, logo t-shirt, event t-shirt',
                   'Custom Adidas Classic Logo T-Shirt – polyester branded tee for corporate events, teams, and promotional campaigns.'],
            [1002, 'adidas cap, promotional cap, branded hat, structured cap, custom headwear, sport cap, embroidered cap',
                   'Adidas Structured Cap in cotton/polyester blend. Branded headwear for sports events, corporate gifts, and team promotions.'],
            [1003, 'adidas duffel bag, sport bag, gym bag, promotional bag, branded duffel, travel bag, logo duffel',
                   'Adidas Sport Duffel Bag – durable polyester gym bag perfect for branded events, employee gifts, and sports sponsorships.'],
            [1004, 'adidas water bottle, sport bottle, branded water bottle, 24oz bottle, promotional drinkware, plastic bottle',
                   'Adidas Sport Water Bottle 24oz – lightweight branded bottle for sports events, gym promotions, and custom imprinting.'],

            // ── BIC ───────────────────────────────────────────────────────────────
            [1005, 'BIC ballpoint pen, promotional pen, branded pen, custom pen, office pen, click pen, trade show pen',
                   'BIC Clic Stic Ballpoint Pen – smooth-writing retractable pen for trade shows, offices, and promotional events.'],
            [1006, 'BIC marker, permanent marker, branded marker, promotional marker, black marker, office marker',
                   'BIC Permanent Marker in black – reliable branded marker for corporate kits, office use, and promotional giveaways.'],
            [1007, 'BIC stylus pen, 2-in-1 pen, touchscreen stylus, promotional stylus, branded pen, tech giveaway',
                   'BIC 2-in-1 Stylus Pen – writes on paper and works on touchscreens. Great for tech promotions and trade show giveaways.'],
            [1008, 'BIC highlighter, promotional highlighter, branded highlighter, brite liner, office highlighter, school supply',
                   'BIC Brite Liner Highlighter – vivid highlighting for branded office kits, school supply giveaways, and promotions.'],

            // ── Cutter & Buck ─────────────────────────────────────────────────────
            [1009, 'Cutter Buck polo, drytec polo, premium polo shirt, corporate polo, branded polo, moisture wicking polo, golf polo',
                   'Cutter & Buck Drytec Polo – moisture-wicking polyester polo for corporate events, golf outings, and executive gifts.'],
            [1010, 'Cutter Buck vest, insulated vest, promotional vest, branded outerwear, polyester vest, executive gift',
                   'Cutter & Buck Insulated Vest – premium polyester fill vest for corporate gifting, outdoor events, and branded apparel.'],
            [1011, 'Cutter Buck jacket, full zip jacket, fleece jacket, branded jacket, corporate outerwear, promotional jacket',
                   'Cutter & Buck Full Zip Jacket – polyester fleece premium outerwear for branded corporate gifting and events.'],
            [1012, 'Cutter Buck tote, canvas tote bag, tour tote, promotional bag, branded canvas bag, golf tote',
                   'Cutter & Buck Tour Tote Bag – durable canvas carry-all ideal for golf tournaments, trade shows, and corporate events.'],

            // ── Hanes ─────────────────────────────────────────────────────────────
            [1013, 'Hanes t-shirt, comfortsoft tee, promotional t-shirt, cotton shirt, branded shirt, custom tee, event shirt',
                   'Hanes ComfortSoft T-Shirt – soft 100% cotton promotional tee for custom printing, events, and team uniforms.'],
            [1014, 'Hanes long sleeve, promotional long sleeve, cotton shirt, branded long sleeve, custom tee, seasonal shirt',
                   'Hanes Long Sleeve Tee – soft cotton branded shirt for seasonal campaigns and custom promotional giveaways.'],
            [1015, 'Hanes hoodie, pullover hoodie, branded hoodie, promotional sweatshirt, cotton polyester hoodie, fleece',
                   'Hanes Pullover Hoodie – comfortable cotton/polyester branded hoodie for corporate apparel and event giveaways.'],
            [1016, 'Hanes polo, jersey polo, cotton polo, promotional polo, branded polo shirt, uniform polo',
                   'Hanes Jersey Polo Shirt – classic cotton polo for corporate uniforms, team wear, and branded promotions.'],

            // ── Koozie ────────────────────────────────────────────────────────────
            [1017, 'koozie can cooler, can sleeve, beverage cooler, neoprene koozie, beer koozie, branded can cooler',
                   'Koozie Can Cooler – neoprene insulated can sleeve for branded beverage promotions, parties, and events.'],
            [1018, 'koozie bottle sleeve, bottle cooler, neoprene sleeve, promotional bottle sleeve, branded drinkware',
                   'Koozie Bottle Sleeve – neoprene insulated bottle wrap. Great for branded beer bottle and water bottle promotions.'],
            [1019, 'koozie cup, vacuum insulated cup, stainless steel cup, 12oz tumbler, promotional drinkware, koozie tumbler',
                   'Koozie Triple-Vacuum Cup 12oz – stainless steel insulated cup for premium drinkware promotions and corporate gifts.'],
            [1020, 'koozie lunch bag, insulated lunch bag, neoprene lunch bag, branded cooler bag, promotional lunch bag',
                   'Koozie Insulated Lunch Bag – neoprene lunch cooler for employee gifts, branded kitchen promotions, and events.'],

            // ── Leatherman ────────────────────────────────────────────────────────
            [1021, 'Leatherman squirt, multi-tool, keychain multi-tool, stainless steel tool, pocket tool, executive gift tool',
                   'Leatherman Squirt PS4 – compact stainless steel keychain multi-tool. A premium executive branded gift.'],
            [1022, 'Leatherman wingman, multi-tool, stainless steel multi-tool, promotional multi-tool, utility tool, branded tool',
                   'Leatherman Wingman Multi-Tool – 14-function stainless steel tool. Ideal for corporate and executive gifts.'],
            [1023, 'Leatherman skeletool, multi-tool, lightweight multi-tool, stainless steel, outdoor tool, branded gift',
                   'Leatherman Skeletool – minimalist stainless steel multi-tool for outdoor enthusiasts. A premium promotional gift.'],
            [1024, 'Leatherman sheath, nylon sheath, multi-tool case, tool holder, belt sheath, protective case',
                   'Leatherman Nylon Sheath – durable belt sheath to protect and carry all standard Leatherman multi-tool models.'],

            // ── Moleskine ─────────────────────────────────────────────────────────
            [1025, 'Moleskine notebook, classic notebook, hardcover journal, promotional notebook, branded journal, large journal',
                   'Moleskine Classic Notebook Large – iconic hardcover journal for corporate branding, executive gifts, and events.'],
            [1026, 'Moleskine pocket notebook, small journal, hardcover notebook, promotional notebook, branded journal',
                   'Moleskine Pocket Notebook – compact hardcover journal for on-the-go note taking and branded promotions.'],
            [1027, 'Moleskine pen, ballpoint pen, resin pen, premium pen, branded pen, writing instrument, executive pen',
                   'Moleskine Classic Ballpoint Pen – sleek resin pen for premium branded gift sets and executive promotions.'],
            [1028, 'Moleskine planner, weekly planner, hardcover planner, promotional planner, branded organizer, scheduler',
                   'Moleskine Weekly Planner Large – hardcover organizer for branded corporate gifts and executive planners.'],

            // ── Nike ──────────────────────────────────────────────────────────────
            [1029, 'Nike dri-fit, performance t-shirt, Nike shirt, polyester tee, branded Nike shirt, athletic shirt',
                   'Nike Dri-FIT T-Shirt – moisture-wicking polyester performance tee for branded sportswear and athletic promotions.'],
            [1030, 'Nike cap, dri-fit cap, swoosh cap, branded cap, promotional hat, performance cap, sport cap',
                   'Nike Dri-FIT Swoosh Cap – moisture-wicking performance cap for sports promotions and branded headwear.'],
            [1031, 'Nike backpack, Brasilia backpack, branded backpack, sport backpack, promotional bag, school bag, Nike bag',
                   'Nike Brasilia Backpack – durable polyester backpack for school promotions, sports teams, and corporate gifting.'],
            [1032, 'Nike water bottle, stainless steel bottle, branded Nike bottle, 24oz bottle, Nike drinkware',
                   'Nike Stainless Steel Bottle 24oz – premium branded drinkware for sports events and corporate promotions.'],

            // ── OGIO ──────────────────────────────────────────────────────────────
            [1033, 'OGIO backpack, metro backpack, laptop bag, promotional backpack, branded bag, corporate bag, OGIO bag',
                   'OGIO Metro Backpack – organized polyester backpack with laptop compartment. Excellent for corporate gifts.'],
            [1034, 'OGIO duffle bag, endurance duffel, gym bag, promotional bag, sport bag, OGIO duffel, branded duffel',
                   'OGIO Endurance Duffle – rugged polyester duffle bag for gym use, travel, and branded corporate promotions.'],
            [1035, 'OGIO laptop sleeve, 15 inch laptop case, neoprene sleeve, branded laptop bag, tech promotional product',
                   'OGIO Laptop Sleeve 15in – neoprene protective case for tech promotions and corporate employee gifts.'],
            [1036, 'OGIO polo shirt, caliber polo, performance polo, branded polo, promotional polo, polyester polo',
                   'OGIO Caliber 2.0 Polo – premium polyester performance polo for corporate uniforms and branded giveaways.'],

            // ── Port Authority ────────────────────────────────────────────────────
            [1037, 'Port Authority jacket, soft shell jacket, branded jacket, promotional outerwear, wind resistant jacket',
                   'Port Authority Soft Shell Jacket – wind-resistant polyester outerwear for corporate branding and employee gifts.'],
            [1038, 'Port Authority polo, silk touch polo, branded polo, corporate polo, poly cotton polo, promotional polo',
                   'Port Authority Silk Touch Polo – smooth poly/cotton polo for corporate uniforms and branded promotional wear.'],
            [1039, 'Port Authority cap, structured cap, branded cap, promotional hat, cotton cap, corporate cap, logo cap',
                   'Port Authority Structured Cap – classic cotton cap for sports events, corporate headwear, and branded promotions.'],
            [1040, 'Port Authority vest, value fleece vest, branded vest, promotional vest, polyester fleece vest',
                   'Port Authority Value Fleece Vest – warm polyester vest for branded corporate gifting and outdoor events.'],

            // ── Stormtech ─────────────────────────────────────────────────────────
            [1041, 'Stormtech jacket, triton softshell, waterproof jacket, branded jacket, softshell outerwear, promotional jacket',
                   'Stormtech Triton Softshell Jacket – weather-resistant polyester jacket for outdoor events and corporate branding.'],
            [1042, 'Stormtech vest, nautilus vest, branded vest, promotional outerwear, waterproof vest, outdoor vest',
                   'Stormtech Nautilus Vest – weatherproof polyester vest for outdoor promotions and corporate branded events.'],
            [1043, 'Stormtech hoodie, Ottawa hoodie, fleece hoodie, branded hoodie, promotional hoodie, polyester hoodie',
                   'Stormtech Ottawa Hoodie – polyester fleece hoodie for corporate branding, team apparel, and outdoor events.'],
            [1044, 'Stormtech poncho, rain poncho, branded poncho, promotional rain gear, event poncho, polyester poncho',
                   'Stormtech Tempest Poncho – lightweight polyester rain poncho for outdoor events and branded emergency kits.'],

            // ── Thermos ───────────────────────────────────────────────────────────
            [1045, 'Thermos bottle, stainless steel bottle, vacuum insulated bottle, 24oz Thermos, promotional drinkware',
                   'Thermos Stainless Vacuum Bottle 24oz – insulated drinkware classic for branded promotions, events, and gifts.'],
            [1046, 'Thermos food jar, stainless steel food container, insulated jar, 16oz food container, branded drinkware',
                   'Thermos Stainless Food Jar 16oz – insulated stainless jar for hot and cold foods. Great for branded giveaways.'],
            [1047, 'Thermos travel mug, stainless steel mug, insulated mug, 16oz mug, branded travel mug, commuter mug',
                   'Thermos Stainless Travel Mug 16oz – insulated mug for on-the-go branded drinkware promotions.'],
            [1048, 'Thermos bottle 40oz, large vacuum bottle, stainless steel, big water bottle, 40oz promotional drinkware',
                   'Thermos Stainless Bottle 40oz – large insulated bottle for active lifestyles and branded hydration promotions.'],

            // ── Titleist ──────────────────────────────────────────────────────────
            [1049, 'Titleist Pro V1, golf balls, branded golf balls, custom golf balls, 12 pack golf balls, tournament balls',
                   'Titleist Pro V1 Golf Balls 12-Pack – premium urethane balls for tournaments, corporate golf events, and gifts.'],
            [1050, 'Titleist cap, tour cap, golf cap, branded golf hat, promotional golf cap, performance cap',
                   'Titleist Tour Performance Cap – polyester premium golf cap for tournaments, corporate events, and branded headwear.'],
            [1051, 'Titleist golf bag, stand bag, Hybrid 14, branded golf bag, promotional tournament bag, carry bag',
                   'Titleist Hybrid 14 Stand Bag – premium 14-way golf stand bag for tournament prizes and corporate gifts.'],
            [1052, 'Titleist golf towel, caddy towel, branded golf towel, promotional golf accessory, cotton golf towel',
                   'Titleist Golf Towel – premium cotton golf towel for tournaments, clubhouse promotions, and branded events.'],

            // ── Under Armour ──────────────────────────────────────────────────────
            [1053, 'Under Armour t-shirt, UA tech tee, performance shirt, branded sportswear, athletic shirt, UA apparel',
                   'Under Armour Tech 2.0 T-Shirt – lightweight polyester performance tee for branded athletic and corporate promotions.'],
            [1054, 'Under Armour polo, performance polo, branded UA polo, promotional polo, moisture wicking polo',
                   'Under Armour Performance Polo – moisture-wicking polyester polo for branded corporate and athletic promotions.'],
            [1055, 'Under Armour cap, Blitzing cap, branded cap, UA hat, promotional athletic cap, logo cap',
                   'Under Armour Blitzing Cap – stretch-fit polyester cap for branded athletic events and corporate promotions.'],
            [1056, 'Under Armour hoodie, Hustle hoodie, fleece hoodie, UA hoodie, branded sweatshirt, promotional hoodie',
                   'Under Armour Hustle Fleece Hoodie – poly/cotton hoodie for premium branded athletic promotions and gifting.'],

            // ── YETI ──────────────────────────────────────────────────────────────
            [1057, 'YETI tumbler, Rambler 20oz, stainless tumbler, YETI cup, insulated tumbler, branded YETI, luxury drinkware',
                   'YETI Rambler 20oz Tumbler – double-wall insulated stainless steel tumbler. A top-tier choice for corporate gifts.'],
            [1058, 'YETI tumbler, Rambler 30oz, large YETI cup, stainless tumbler, branded drinkware, premium tumbler',
                   'YETI Rambler 30oz Tumbler – large double-wall insulated tumbler for premium branded promotions and executive gifts.'],
            [1059, 'YETI cooler, Hopper Flip 12, soft cooler, insulated cooler bag, waterproof cooler, YETI giveaway',
                   'YETI Hopper Flip 12 Soft Cooler – leakproof waterproof cooler for outdoor events and premium corporate gifts.'],
            [1060, 'YETI mug, Rambler mug, 14oz mug, stainless mug, YETI drinkware, branded YETI mug, camping mug',
                   'YETI Rambler 14oz Mug – rugged stainless steel insulated mug for branded drinkware promotions and executive gifts.'],

            // ── Zebra ─────────────────────────────────────────────────────────────
            [1061, 'Zebra pen, F-301 pen, stainless steel pen, ballpoint pen, branded pen, promotional writing pen',
                   'Zebra F-301 Ballpoint Pen – stainless steel retractable pen for professional branded promotions and office kits.'],
            [1062, 'Zebra gel pen, Sarasa clip pen, smooth gel pen, branded pen, promotional pen, writing instrument',
                   'Zebra Sarasa Clip Gel Pen – smooth gel ink pen with clip for branded office promotions and event giveaways.'],
            [1063, 'Zebra Mildliner, highlighter set, dual tip highlighter, pastel highlighter, branded highlighter, creative kit',
                   'Zebra Mildliner Highlighter Set – dual-tip pastel highlighters for creative branded promotions and office gifts.'],
            [1064, 'Zebra gift set, pen notebook set, branded writing set, promotional stationery set, executive gift set',
                   'Zebra Pen & Notebook Gift Set – premium branded writing set for executive gifts and corporate promotions.'],

            // ── Auto ──────────────────────────────────────────────────────────────
            [1065, 'tire pump, hand pump, portable tire inflator, auto accessory, car promotional product, roadside kit',
                   'Portable Hand Tire Pump – compact plastic/metal tire pump for roadside safety branded auto giveaways.'],
            [1066, 'air compressor, electric tire inflator, portable compressor, car accessory, auto promo, digital inflator',
                   'Electric Portable Air Compressor – ABS plastic powered inflator for branded auto safety and emergency kits.'],
            [1067, 'tire pressure gauge, digital gauge, auto accessory, car promo product, tire tool, digital tire gauge',
                   'Digital Tire Pressure Gauge – precise ABS plastic gauge for auto-themed branded giveaways and safety kits.'],
            [1068, 'tire gauge, pencil gauge, analog tire gauge, auto accessory, car promo, metal tire gauge',
                   'Analog Pencil Tire Pressure Gauge – classic metal/plastic gauge for auto promotions and vehicle safety kits.'],
            [1069, 'warning triangle, road safety, emergency triangle, reflective triangle, car emergency kit, auto safety',
                   'Road Emergency Warning Triangle Set – reflective safety triangles for branded car safety and emergency kits.'],
            [1070, 'LED road flare, emergency flare, road safety, LED warning light, car emergency kit, flare set',
                   'LED Road Flare Emergency Kit 3-Pack – polycarbonate LED flares for roadside safety and branded emergency giveaways.'],
            [1071, 'sunglass holder, visor clip, car sunglass holder, auto accessory, branded visor clip, sunglasses organizer',
                   'Car Visor Sunglass Holder Clip – ABS plastic visor clip to hold sunglasses. Popular auto branded giveaway.'],
            [1072, 'sunglass organizer, visor organizer, dual slot holder, car accessory, PU leather visor clip, sunglasses',
                   'Dual-Slot Visor Sunglass Organizer – PU leather-look sun visor organizer for branded auto gifts and promotions.'],
            [1073, 'ice scraper, snow brush, car ice scraper, winter car accessory, snow removal, branded winter product',
                   'Heavy-Duty Ice Scraper with Snow Brush – polypropylene winter car tool for cold-weather branded promotions.'],
            [1074, 'telescoping ice scraper, extendable snowbrush, winter car tool, auto accessory, long ice scraper',
                   'Telescoping Ice Scraper Snowbrush – extendable polypropylene winter tool for seasonal branded auto giveaways.'],

            // ── Blankets ──────────────────────────────────────────────────────────
            [1075, 'fleece blanket, promotional blanket, 50x60 blanket, branded blanket, polyester fleece, custom blanket',
                   'Promotional Fleece Blanket 50x60 – soft polyester fleece for branded events, corporate gifts, and custom printing.'],
            [1076, 'sherpa blanket, throw blanket, sherpa throw, luxury blanket, premium branded blanket, 50x60',
                   'Sherpa Lined Throw Blanket 50x60 – luxurious sherpa/polyester throw for premium corporate gifts and promotions.'],
            [1077, 'woven blanket, knit throw, acrylic blanket, promotional blanket, branded throw, custom woven blanket',
                   'Woven Knit Throw Blanket 50x60 – acrylic knit branded throw for promotional gifting and custom events.'],
            [1078, 'sublimated blanket, full color blanket, custom printed blanket, all-over print blanket, branded blanket',
                   'Full-Color Sublimated Blanket 50x60 – vivid all-over polyester print blanket for corporate branded gifting.'],
            [1079, 'stadium blanket, polar fleece, stadium throw, sports blanket, branded blanket, game day blanket',
                   'Polar Fleece Stadium Blanket 48x58 – lightweight branded throw for sporting events and season ticket giveaways.'],

            // ── Towels ────────────────────────────────────────────────────────────
            [1080, 'beach towel, promotional towel, 30x60 towel, cotton terry towel, branded beach towel, summer promo',
                   'Promotional Beach Towel 30x60 – soft cotton terry towel for summer events, resorts, and branded promotions.'],
            [1081, 'golf towel, caddy towel, Titleist towel, branded golf towel, cotton golf accessory, tournament towel',
                   'Golf Caddy Towel 16x24 – cotton terry golf towel for tournaments, clubhouse giveaways, and branded events.'],
            [1082, 'gym towel, microfiber towel, sport towel, branded gym towel, fitness towel, workout towel',
                   'Microfiber Gym Towel 15x36 – ultra-absorbent sport towel for gym promotions and branded fitness giveaways.'],
            [1083, 'cooling towel, sport cooling towel, PVA towel, instant cool towel, athletic towel, branded sport towel',
                   'Sport Cooling Towel 12x33 – PVA/microfiber instant cooling towel for athletes and outdoor branded promotions.'],
            [1084, 'bath towel, promotional bath towel, 27x54 towel, cotton terry bath towel, branded hotel towel, spa towel',
                   'Promotional Bath Towel 27x54 – plush cotton terry for hotels, spas, and branded promotional gifting.'],
            [1085, 'microfiber towel set, 3 piece towel set, branded towel set, promotional towel, cleaning towel, multi-use towel',
                   'Microfiber Towel 3-Piece Set – versatile towels for branded household, automotive, or sports promotions.'],

            // ── Travel Blankets ───────────────────────────────────────────────────
            [1086, 'packable blanket, travel blanket, snap case blanket, ripstop blanket, branded travel accessory, carry-on blanket',
                   'Packable Travel Blanket with Snap Case – compact ripstop polyester blanket for travel and branded gifting.'],
            [1087, 'stadium travel blanket, compact blanket, fleece travel blanket, packable blanket, branded stadium blanket',
                   'Compact Stadium Travel Blanket 40x50 – packable polyester fleece for sports and travel branded promotions.'],
            [1088, 'travel blanket pillow, blanket pillow combo, travel set, branded travel kit, pillow blanket set',
                   'Travel Blanket & Pillow Combo Set – polyester blanket and pillow for travel and branded convenience gifts.'],
            [1089, 'poncho blanket, fleece poncho, wearable blanket, travel poncho, branded blanket, one size wrap',
                   'Fleece Travel Poncho Blanket – wearable polar fleece poncho/blanket for outdoor events and branded promotions.'],
            [1090, 'airline blanket, fleece blanket, small travel blanket, airline promotional blanket, compact fleece blanket',
                   'Airline-Size Promotional Fleece Blanket – compact polyester fleece for travel promotions and airline event gifts.'],
            [1091, 'emergency blanket, mylar blanket, foil survival blanket, car emergency kit, thermal blanket, roadside safety',
                   'Car Emergency Foil Blanket – reflective Mylar survival blanket for auto safety kits and emergency preparedness.'],
            [1092, 'microfiber travel towel, packable towel, 24x48 towel, branded travel towel, quick dry towel, camping towel',
                   'Packable Microfiber Travel Towel 24x48 – quick-dry towel for travel promotions and branded outdoor gifts.'],

            // ── Stress Relievers ──────────────────────────────────────────────────
            [1093, 'stress ball, round stress ball, foam stress ball, branded stress reliever, squeeze ball, trade show giveaway',
                   'Round Stress Ball – squeezable polyurethane foam stress reliever for branded trade shows and wellness promotions.'],
            [1094, 'mini stress ball, small stress ball, foam ball, branded stress ball, tiny stress reliever, pocket giveaway',
                   'Mini Stress Ball 1.5in – compact foam squeeze ball for branded trade show giveaways and wellness promotions.'],
            [1095, 'stress cube, fidget cube, fidget toy, branded fidget, desk toy, office toy, promotional stress toy',
                   'Stress Cube Fidget Toy – ABS plastic multi-action fidget cube for branded desks and wellness promotions.'],
            [1096, 'snake puzzle, twist puzzle, fidget toy, magic snake, branded puzzle toy, novelty promotional product',
                   'Magic Snake Twist Puzzle – ABS plastic twisting puzzle for branded novelty promotions and trade show giveaways.'],
            [1097, 'pizza stress ball, food stress reliever, novelty stress ball, pizza shaped toy, branded food promo',
                   'Pizza Slice Stress Reliever – foam pizza-shaped squeeze toy for food industry brands and novelty promotions.'],
            [1098, 'apple stress ball, fruit stress reliever, apple shaped toy, novelty stress ball, education giveaway',
                   'Apple Stress Reliever – foam apple squeeze toy for education, healthcare, and branded promotional giveaways.'],
            [1099, 'donut stress ball, food stress reliever, donut shaped toy, bakery promo, novelty branded giveaway',
                   'Donut Stress Reliever – foam donut squeeze toy for bakery, food service, and branded novelty promotions.'],
            [1100, 'burger stress ball, hamburger stress reliever, food industry promo, novelty stress ball, fast food giveaway',
                   'Burger Stress Reliever – foam hamburger squeeze toy for food industry brands and trade show giveaways.'],
            [1101, 'house stress ball, house shaped stress reliever, real estate stress ball, foam house, realtor promo',
                   'House Shape Stress Reliever – foam house squeeze toy perfect for real estate branded promotions and open houses.'],
            [1102, 'car stress ball, vehicle stress reliever, auto stress ball, branded car toy, automotive promotional product',
                   'Car Shape Stress Reliever – foam car squeeze toy for automotive brands and trade show giveaways.'],
            [1103, 'star stress ball, star shaped stress reliever, foam star, branded star toy, award giveaway, star squeeze',
                   'Five-Point Star Stress Reliever – foam star squeeze toy for branded events, award ceremonies, and promotions.'],
            [1104, 'heart stress ball, heart stress reliever, foam heart, healthcare promo, valentine giveaway, medical branded',
                   'Heart Shape Stress Reliever – foam heart squeeze toy for healthcare, wellness, and branded health promotions.'],
            [1105, 'football stress ball, sports stress reliever, foam football, branded sports stress toy, NFL themed giveaway',
                   'Football Stress Reliever – foam football squeeze toy for sports brands, game day events, and branded giveaways.'],
            [1106, 'baseball stress ball, sports stress reliever, foam baseball, branded sports toy, baseball promotional',
                   'Baseball Stress Reliever – foam baseball squeeze toy for sports team promotions and branded giveaways.'],
            [1107, 'basketball stress ball, sports stress reliever, foam basketball, branded basketball toy, sports giveaway',
                   'Basketball Stress Reliever – foam basketball squeeze toy for sports teams, events, and branded promotions.'],
            [1108, 'golf ball stress reliever, foam golf ball, golf promo, branded golf giveaway, golf stress ball, putting event',
                   'Golf Ball Stress Reliever – foam golf squeeze toy for tournaments, corporate golf events, and branded promos.'],
            [1109, 'fidget spinner, 3 blade spinner, branded spinner, promotional fidget toy, desk spinner, stress spinner',
                   'Fidget Spinner 3-Blade – ABS plastic spinner for branded novelty promotions and wellness event giveaways.'],
            [1110, 'pop it fidget toy, silicone fidget, bubble pop toy, branded sensory toy, promotional pop it, fidget giveaway',
                   'Pop It Silicone Fidget Toy Square – tactile bubble pop toy for branded wellness and novelty promotions.'],
            [1111, 'mesh stress ball, squeeze ball, gel stress ball, mesh ball, sensory toy, branded stress reliever',
                   'Mesh Squeeze Ball – satisfying mesh/gel stress reliever for branded trade shows and wellness promotions.'],
            [1112, 'stretchy fidget toy, string fidget, TPR rubber toy, sensory fidget, stretchy stress toy, branded toy',
                   'Stretchy String Fidget Toy – TPR rubber tactile toy for branded novelty promotions and stress relief giveaways.'],
            [1113, 'stress relief kit, desk toy set, fidget kit, branded stress kit, 5 piece set, office wellness kit',
                   'Desk Stress Relief Kit 5-Piece – desktop fidget and stress toy set for branded wellness corporate promotions.'],
            [1114, 'zen garden, desktop zen kit, mini zen garden, branded relaxation kit, executive desk gift, sand garden',
                   'Mini Zen Garden Desktop Kit – wood and sand mindfulness kit for executive branded gifts and wellness promotions.'],
            [1115, 'thinking putty, stress putty, silicone putty, branded putty tin, sensory play, desk stress toy',
                   'Thinking Putty Stress Tin 2oz – silicone putty in a tin for creative branded stress relief promotions.'],
            [1116, 'tangle fidget toy, tangle twist, fidget toy, ABS fidget, branded sensory toy, interconnected fidget',
                   'Tangle Twist Fidget Toy – ABS plastic interconnected fidget toy for branded wellness and novelty promotions.'],
        ];

        DB::table('product_meta')->upsert(
            array_map(fn ($r) => [
                'item_serial'      => $r[0],
                'keywords'         => $r[1],
                'meta_description' => $r[2],
            ], $rows),
            ['item_serial'],
            ['keywords', 'meta_description']
        );
    }
}
