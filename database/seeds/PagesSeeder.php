<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'slug' => 'legal-text',
            'title' => 'Información legal',
            'content' => '
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultricies venenatis augue, vitae imperdiet libero ultrices in. Aenean mattis, felis eu rhoncus porttitor, est ipsum elementum metus, non dictum neque ante at metus. Pellentesque vel volutpat diam. Sed ullamcorper ante velit, id sollicitudin ex vehicula non. Aenean fringilla sollicitudin neque scelerisque pharetra. Phasellus ac lorem ac nisl sodales semper. Vestibulum massa nisl, vulputate quis vehicula in, tempus id metus. Nunc nec mauris egestas, elementum lorem in, tristique nunc. Cras porta a orci eu scelerisque. Vivamus blandit velit odio, quis mollis leo varius ut.
                        Vestibulum lobortis ipsum sed magna vehicula, eget consectetur ex commodo. Maecenas et quam nec turpis efficitur viverra. Duis elementum pharetra nibh. Nunc sodales mauris vitae rhoncus consectetur. Nulla facilisi. Aenean sollicitudin sodales libero a suscipit. Donec nec sapien mauris. Etiam at tincidunt lorem. Donec pharetra eu velit in mattis. Fusce sit amet orci vitae nulla convallis consectetur id nec mauris.
                        Proin aliquam nec dui ut pulvinar. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam odio ex, dapibus tempor nisl eu, ornare bibendum odio. Cras eget rhoncus erat. Donec vitae interdum arcu. Cras sit amet aliquam nisi. Nulla facilisi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed nec ullamcorper risus, quis maximus libero. Proin id ullamcorper erat, ac aliquam nulla. Nullam ut luctus mi. Etiam cursus velit vel bibendum porttitor.
                        Suspendisse faucibus lacus nec diam finibus consequat at ullamcorper dui. Suspendisse id pellentesque diam, non tempor neque. Ut eu quam et eros ornare rutrum vitae et erat. Phasellus vel ipsum risus. Suspendisse ullamcorper dignissim dui, vitae eleifend erat mollis et. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec tempus mi sed enim mollis, vitae lobortis ligula efficitur. Curabitur dictum ullamcorper malesuada. Donec sed orci condimentum, ultricies ligula sed, mollis lacus.
                        Fusce vitae turpis quis quam congue fermentum. In mattis feugiat ornare. Vivamus ultrices nisl ullamcorper velit dignissim, hendrerit condimentum sem consequat. Proin vel velit sem. In at dictum lacus. Sed tristique sem eu porta ultricies. Cras sit amet blandit nulla. Pellentesque orci justo, malesuada ac suscipit posuere, finibus at felis. ',
            'created_at' => DB::Raw('NOW()'),
            'updated_at' => DB::Raw('NOW()')
        ]);
    }
}
