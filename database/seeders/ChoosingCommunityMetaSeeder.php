<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * SEO keywords and meta descriptions for Choosing Community products
 * (serials 1117 – 1151).  Uses upsert so it is safe to re-run.
 */
class ChoosingCommunityMetaSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // [item_serial, keywords, meta_description (≤160 chars)]
        $rows = [
            [1117, 'RPET laundry bag, eco drawstring bag, recycled bag, college giveaway, freshman kit, sustainable bag, eco-friendly promotional bag',
                   'Freshman RPET Laundry Bag – recycled polyester drawstring bag for college orientation kits and eco-friendly branded promotions.'],

            [1118, 'micro plush blanket, travel blanket, hooded blanket, pillow case blanket, plush travel combo, cozy blanket, branded travel blanket',
                   'Cuddle Micro Plush Travel Blanket with Hood & Pillow Case – cozy branded travel combo for gifting and on-the-go promotions.'],

            [1119, 'recycled tumbler, eco tumbler, 12oz tumbler, sustainable drinkware, polypropylene tumbler, branded eco cup, eco-friendly drinkware',
                   'Paragon 12 oz Recycled Tumbler – eco-friendly recycled polypropylene and stainless steel drinkware for branded promotions.'],

            [1120, 'RPET cooler backpack, eco cooler bag, 20-can backpack, recycled cooler, branded cooler backpack, sustainable backpack, cooler pack',
                   'Polaris 20-Can RPET Cooler Backpack – eco recycled polyester cooler pack for branded outdoor events and promotions.'],

            [1121, 'hot cold pack, aqua pearls, ice pack, popsicle pack, gel pack, hot cold therapy, health wellness giveaway, branded therapy pack',
                   'Popsicle Aqua Pearls™ Hot/Cold Pack – dual-use gel bead pack for branded health and wellness promotions.'],

            [1122, 'light up wristband, LED wristband, silicone wristband, event wristband, safety wristband, glow band, branded light-up band',
                   'Pixie Light-Up Wristband – silicone LED wristband for events, safety campaigns, and branded novelty giveaways.'],

            [1123, 'emoji pen, novelty pen, fun pen, branded pen, promotional pen, smiley pen, emoji office pen, trade show pen',
                   'Emoji Pen – fun novelty ballpoint pen for branded office kits, trade shows, and event giveaways.'],

            [1124, 'phone wallet, card holder, magnetic ring, phone grip, 3-card wallet, branded phone accessory, vegan leather wallet, MagSafe wallet',
                   'Avon 3-Card Phone Wallet with Magnetic Ring – vegan leather card holder and phone grip for branded tech promotions.'],

            [1125, 'bag hanger, table hook, purse hook, cloak hanger, branded bag hook, travel accessory, foldable hook, handbag hanger',
                   'Cloak Bag Hanger for Tables – zinc alloy foldable hook for bags and purses. A practical branded travel giveaway.'],

            [1126, 'mug can cooler combo, vacuum insulated mug, stainless steel mug, 20oz mug, 12oz can cooler, drinkware combo set, branded drinkware',
                   'Novo Combo – 20 oz vacuum insulated mug with screw-on 12 oz can cooler. Premium stainless branded drinkware gift.'],

            [1127, '4-in-1 charging cable, multi charging cable, Apple Watch charger, USB-C cable, branded tech cable, universal charger, branded cable',
                   'Tribute 4-in-1 Charging Cable with Watch Charger – universal TPE cable for all connector types and Apple Watch.'],

            [1128, 'key ring, multi-tool keychain, signature key ring, stainless keychain, Best Buddy Tools, branded keychain, corporate key ring',
                   'Best Buddy Tools® Signature Key Ring – stainless steel and zinc alloy key ring for branded gifts and giveaways.'],

            [1129, 'pocket binoculars, compact binoculars, 8x21 binoculars, Best Buddy Tools, branded binoculars, outdoor optical tool, bird watching',
                   'Best Buddy Tools® 8x21 Compact Pocket Binoculars – polycarbonate optics for outdoor events and branded corporate gifts.'],

            [1130, 'bouncing ball, super bounce ball, nitro ball, novelty ball, rubber ball, branded bounce toy, kids event giveaway',
                   'Nitro Super Bouncing Ball – high-bounce rubber ball for branded novelty giveaways, kids events, and promotions.'],

            [1131, 'soft touch tote, tote bag, non-woven tote, branded tote, pearl tote bag, promotional bag, event tote, value tote',
                   'Pearl Soft-Touch Tote Bag – non-woven polypropylene tote for branded events, trade shows, and value promotions.'],

            [1132, 'BBQ set, grilling set, 5-piece BBQ, cutting board BBQ, branded outdoor set, stainless grill tools, bamboo cutting board, corporate gift',
                   'Firepit 5-Piece BBQ Set with Cutting Board – stainless steel and bamboo grilling set for branded outdoor gifts.'],

            [1133, 'push pop cube, fidget cube, bubble pop toy, silicone cube, stress toy, branded fidget, pop-it cube, sensory toy',
                   'Push Pop Cube – silicone pop-it fidget cube for branded wellness promotions and novelty trade show giveaways.'],

            [1134, 'cup caddy, neoprene pouch, mug pouch, mug holder, drinkware bag, cup carrier, branded pouch, zippered mug bag',
                   'Cup Caddy Zippered Pouch for Large Mugs – neoprene mug carrier for branded drinkware convenience promotions.'],

            [1135, 'spinning ring pen, Saturn pen, novelty pen, branded pen, promotional pen, spin pen, fun office pen, spinning pen',
                   'Saturn Spinning Ring Pen – ABS novelty pen with spinning ring for branded trade show and office promotions.'],

            [1136, 'spinning top, Theta top, fidget spinner top, desk toy, metal spinning top, branded desk toy, novelty spinning toy',
                   'Theta Spinning Top – ABS and metal spinning top for branded desk giveaways and stress relief promotions.'],

            [1137, 'pickleball set, pickleball paddles, Rally pickleball, branded pickleball, sports promotional set, outdoor paddle game, corporate sport',
                   'Rally Pickleball Set – polypropylene paddle set for sports events, corporate tournaments, and branded giveaways.'],

            [1138, 'Bluetooth keychain, tracker keychain, never lost keychain, AeroLOFT, smart keychain, branded Bluetooth tracker, key finder',
                   'AeroLOFT® Never Lost Bluetooth Keychain – smart tracker keychain for branded tech promotions and corporate gifts.'],

            [1139, 'eye pillow, heat therapy, heated eye mask, flaxseed eye pillow, wellness gift, hot cold eye pad, branded eye pillow, spa gift',
                   'Comfort Pals™ Heat Therapy Eye Pillow – flaxseed fill heated eye pillow for wellness and branded health gifts.'],

            [1140, 'microfiber cloth, screen cleaning cloth, microfiber wipe, 220gsm cloth, branded cleaning cloth, lens cloth, PVC case cloth',
                   '6x6" 220GSM Microfiber Cleaning Cloth in PVC Case – branded screen and lens wipe for office and tech promotions.'],

            [1141, 'microfiber sports towel, waffle towel, Gridiron towel, branded sports towel, 12x32 towel, gym towel, sport giveaway towel',
                   'Gridiron 12x32" Waffle Microfiber Sports Towel – quick-dry branded towel for fitness and sports promotions.'],

            [1142, 'full color beach towel, microfiber beach towel, 30x60 towel, branded beach towel, Seaside towel, sublimated beach towel',
                   'Seaside Full-Color 30x60" Waffle Microfiber Beach Towel – vivid branded towel for summer events and promotions.'],

            [1143, 'stadium cushion, seat cushion, fold n go cushion, adjustable seat pad, bleacher cushion, sports event seat, branded cushion',
                   'Fold N Go Adjustable Stadium Seat Cushion – polyester foam cushion for branded sports and outdoor event giveaways.'],

            [1144, 'cotton mesh tote, collapsible tote bag, eco tote, reusable bag, Sonnet tote, branded eco tote, sustainable shopping bag',
                   'Sonnet Collapsible Cotton Mesh Tote – reusable eco cotton bag for branded sustainable shopping promotions.'],

            [1145, 'inflatable beach ball, 16 inch beach ball, PVC beach ball, branded beach ball, summer event promo, outdoor inflatable',
                   'Sunburst 16" Inflatable Beach Ball – vibrant PVC ball for beach parties, summer events, and branded outdoor giveaways.'],

            [1146, 'lip balm, chap cube, cube lip balm, vanilla lip balm, branded lip care, SPF moisturizer, novelty lip balm',
                   'Chap-Cube Vanilla Lip Balm – novelty cube-shaped SPF moisturizing lip balm for branded wellness giveaways.'],

            [1147, 'sunscreen stick, SPF 30 sunscreen, branded sun protection, outdoor health promo, sunscreen giveaway, SPF stick',
                   'Safeguard Sunscreen Stick SPF 30 – branded sun protection stick for outdoor events and health promotions.'],

            [1148, 'lip balm sunscreen combo, SPF combo kit, branded health kit, sun protection set, wellness promo, lip and sun care',
                   'Lip Balm & Sunscreen Stick Combo – SPF branded two-in-one wellness kit for outdoor and health event promotions.'],

            [1149, 'foam football, fun flinger, soft foam football, mini football, branded sports toy, kids football, foam sport giveaway',
                   'Fun Flinger Foam Football – soft foam mini football for sports themed branded events and promotional giveaways.'],

            [1150, 'poncho ball, rain poncho, emergency poncho, branded emergency kit, compact poncho, travel poncho, rainy day promo',
                   'Rainy Day Poncho Ball – compact PEVA emergency poncho in ball form for travel kits and branded event giveaways.'],

            [1151, 'hand sanitizer, gel hand sanitizer, 1oz sanitizer, branded sanitizer, health giveaway, hygiene promotional product, antibacterial gel',
                   'Gel Go 1 oz Hand Sanitizer – portable branded sanitizer for health and hygiene trade show and event promotions.'],
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
