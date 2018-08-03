<?php

use Illuminate\Database\Seeder;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'title' => 'KOG lo peta',
            'summary' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, conubia in hendrerit enim dictumst tortor, tempor euismod ad turpis dui aliquam. Aliquet taciti iaculis sed cursus dui nascetur duis, integer blandit posuere mollis leo molestie, bibendum ligula ullamcorper laoreet porta proin. Nostra ligula ornare nisl augue neque cum diam at morbi, montes mi ad vivamus aenean natoque semper vehicula ultricies, convallis cubilia urna aliquet facilisi posuere mauris ultrices.',
            'description' => '
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit feugiat sodales egestas donec lacinia, erat ullamcorper suscipit magnis habitasse pulvinar placerat varius consequat leo sapien. Sem tempus velit sociosqu phasellus rhoncus pretium fermentum fames, molestie condimentum luctus inceptos massa magnis class elementum, ridiculus torquent ullamcorper ad platea vivamus sapien. Gravida arcu etiam urna ligula non montes pretium, duis semper commodo eu ac congue scelerisque condimentum, volutpat neque consequat penatibus placerat rhoncus.</p><br><p>Fermentum eu ullamcorper conubia laoreet dui condimentum litora nec placerat nascetur sociosqu malesuada commodo, molestie justo imperdiet magnis elementum aliquet vestibulum torquent hac curabitur nibh at. Platea nisl ornare libero consequat quam eu nec class mus tristique eros, metus gravida ridiculus venenatis himenaeos ante aenean eleifend etiam augue, purus non placerat feugiat bibendum maecenas cursus primis erat velit. Imperdiet nisl sollicitudin dictumst tristique dapibus pharetra condimentum nulla bibendum cursus, erat leo hendrerit nunc curae curabitur inceptos turpis suscipit, duis commodo lectus arcu euismod parturient accumsan phasellus mi.</p><br><p>Luctus aliquet parturient primis at iaculis suspendisse inceptos sodales feugiat rhoncus, aptent arcu accumsan magna hendrerit interdum dapibus convallis torquent potenti, hac aenean nisi neque id ligula et augue class. Donec augue luctus odio natoque ut gravida libero condimentum nascetur felis sollicitudin praesent in, fermentum purus cubilia eleifend at leo ligula est velit eget enim. Mollis purus proin urna taciti placerat facilisi class volutpat, non maecenas morbi platea in sociis sed porttitor, parturient lobortis dignissim velit ridiculus nisl aenean. Porta placerat tellus sagittis vulputate venenatis at elementum tempus, purus arcu eu erat pulvinar mauris leo, est velit senectus sociis dictumst commodo phasellus.</p>
            ',
            'blog_category_id' => 1,
            'status' => 'Borrador',
            'author_id' => 1,
            'created_at' => DB::Raw('NOW()'),
            'updated_at' => DB::Raw('NOW()')
        ]);
    }
}
