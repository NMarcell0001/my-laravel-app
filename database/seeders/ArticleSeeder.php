<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'title' => 'Fans Rejoice: The Long-Awaited Van Dobben Saté Croquet is Finally Here!',
                'body' => '
            <p>It\'s official! After months of anticipation, the Van Dobben Saté Croquet (20x 100 gr) is now available
            in our stores. Fans of this unique snack have been clamoring for its return, and we\'ve heard you loud and
            clear. This croquet combines the perfect blend of flavors, with a creamy satay filling wrapped in a crispy
            outer layer.</p>
            <p>"I couldn\'t believe it when I saw it back in stock!" said one excited customer. "I\'ve been waiting for
            this since last year. Now, my snack nights are complete."</p>
            <p>So don\'t wait too long—grab your Van Dobben Saté Croquet today and experience what all the hype is
            about. It\'s the perfect treat for parties, family gatherings, or even a cozy night in.</p>
        ',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Over 1,000 Happy Customers: A Milestone Worth Celebrating!',
                'body' => '
            <p>We are thrilled to announce that we have surpassed 1,000 happy customers! This incredible milestone is a
            testament to your loyalty and love for our wide selection of products, from Ultiem Bitterballen to the
            famous Frikandel Extra Ultiem.</p>
            <p>Our bestsellers this month include the Ultiem Vleeskroket (28x 100 gr) and the Van Lieshout Frikandel
            Bikfrik Speciaal. These products have been flying off the shelves thanks to their unbeatable taste and
            quality.</p>
            <p>Here\'s to growing our community even further. Stay tuned for more exciting products and exclusive
            offers. Thank you for choosing us as your snack partner!</p>
        ',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'The Ultimate Guide to Pairing Snacks with Sauces',
                'body' => '
            <p>Did you know that the right sauce can elevate your snacking experience? Our team of snack enthusiasts has
            put together the ultimate guide to pairing snacks with sauces, and it\'s guaranteed to make your taste buds
            sing.</p>
            <p>For example, the Mora Kipkorn (36x 80 gr) pairs beautifully with Oliehoorn Knoflooksaus, while the Elite
            Nasischijf (18x 130 gr) is enhanced by a drizzle of Wijko Satésaus. And let\'s not forget the classic
            combination of Van Dobben Rundvlees Croquet with Wijngaarden Zaanse Mayonaise.</p>
            <p>Explore these pairings and discover a whole new world of flavor. Your snack time will never be the
            same!</p>
        ',
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Frikandel Showdown: Extra Ultiem vs. Van Lieshout',
                'body' => '
            <p>It\'s the battle of the frikandels! In one corner, we have the Frikandel Extra Ultiem (40x 100 gr), known
            for its rich flavor and juicy texture. In the other corner, the Van Lieshout Frikandel Extra (40x 100 gr), a
            fan favorite with a perfectly balanced seasoning.</p>
            <p>After a blind taste test, the results were shockingly close. Many tasters praised the Ultiem for its
            luxurious taste, while others couldn\'t resist the nostalgic charm of Van Lieshout. Ultimately, both emerged
            as winners in their own right.</p>
            <p>Why choose one when you can enjoy both? Try them today and decide for yourself which frikandel deserves
            the crown!</p>
        ',
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Snack Spotlight: The Rise of Mini Bitterballen',
                'body' => '
            <p>Mini bitterballen are taking the snack world by storm, and it\'s easy to see why. These bite-sized
            delights, like the Ultiem Bitterbal 20% (100x 20 gr), pack all the flavor of their larger counterparts into
            a convenient, poppable form.</p>
            <p>Perfect for parties, office gatherings, or a quick snack on the go, mini bitterballen are as versatile as
            they are delicious. Pair them with Elite Joppiesaus or Remia Kruidige Pindasaus for a flavor explosion.</p>
            <p>Try them at your next event and see why everyone is raving about this mini marvel. Warning: they
            disappear fast!</p>
        ',
                'published_at' => now()->subDays(2),
            ],
        ]);
    }
}
