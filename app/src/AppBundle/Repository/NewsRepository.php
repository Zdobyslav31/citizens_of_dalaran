<?php
/**
 * Created by PhpStorm.
 * User: jedrzej
 * Date: 25.04.18
 * Time: 10:04
 */

namespace AppBundle\Repository;


class NewsRepository
{
    /**
     * Bookmarks array
     *
     * @var array $bookmarks
     */
    protected $news = [
        [
            'title' => 'Jedziemy na Pyrkon',
            'tags' => [
                'Pyrkon', 'Warcraft', 'foto',
            ],
            'created_date' => '2018-01-19',
            'created_author' => 'Daquelia',
            'modified_date' => '2018-03-26',
            'modified_author' => 'Komzurak',
            'summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p>',
            'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p><p>Vestibulum porta ligula vitae aliquam pharetra. Nam in est ut eros mollis aliquam. Fusce sit amet sapien pulvinar, dapibus turpis nec, imperdiet nibh. Ut et lacus sed velit condimentum tincidunt. Vivamus in turpis suscipit, euismod quam quis, porta sem. Integer lectus elit, sodales id sagittis ut, consequat a nisl. Nullam ut orci id lacus vestibulum cursus. Maecenas consequat ac nulla quis euismod. Nullam lacinia, justo sed venenatis scelerisque, nibh magna lobortis tellus, a luctus quam est eget mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Pellentesque libero justo, dignissim sit amet nulla luctus, maximus venenatis felis. Quisque sollicitudin dolor eu arcu vehicula ullamcorper. Fusce aliquet facilisis hendrerit. Sed mattis auctor leo, et volutpat augue. Duis pharetra eros ut tortor porta, in dictum metus lobortis. Nulla est arcu, rhoncus ac lobortis sed, ultrices ac neque. Aenean blandit mi ut malesuada venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac ultricies neque, vitae condimentum sem. Suspendisse sed lorem in est sagittis elementum venenatis id quam. In cursus arcu eu lacus varius, ut mollis nisi auctor. Suspendisse tincidunt mattis diam ac pulvinar. Quisque dui arcu, dapibus a commodo sed, aliquet et diam.</p><p>Pellentesque rutrum rhoncus ligula, ac dictum justo facilisis id. Suspendisse fermentum euismod ex in porttitor. Nulla pulvinar risus ac rhoncus bibendum. Phasellus at luctus ante. Vivamus id libero maximus, sagittis velit nec, interdum nulla. Nulla tincidunt, magna eget condimentum rhoncus, ipsum arcu faucibus nibh, sed tincidunt enim odio non metus. Phasellus justo elit, faucibus sit amet dictum in, laoreet vitae risus. Duis sem nibh, rutrum ut lorem vestibulum, posuere laoreet nisi. Quisque at elit pharetra, tempor enim sit amet, aliquam tellus.</p><p>Sed accumsan quam ornare congue convallis. Mauris eget velit elementum, tempor ipsum vel, scelerisque arcu. Phasellus eget eleifend sapien, ut lobortis magna. Nam posuere lorem sit amet erat hendrerit accumsan. Morbi viverra rutrum nulla. Suspendisse pharetra viverra velit. Pellentesque lobortis nulla vitae ante eleifend dapibus quis eget metus. In nisi neque, consectetur eget mollis a, convallis sit amet leo.</p>',
            'img' => 'https://strefasingla.pl/uploads/events/0fb0/0fb0fa5250866d8e9c27fb68bcdcbcfb14d3f5c5.jpg'
        ],
        [
            'title' => 'Crafting u Rzepy',
            'tags' => [
                'Crafting', 'stroje',
            ],
            'created_date' => '2018-02-19',
            'created_author' => 'Komzurak',
            'modified_date' => '2018-04-26',
            'modified_author' => 'Komzurak',
            'summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p>',
            'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p><p>Vestibulum porta ligula vitae aliquam pharetra. Nam in est ut eros mollis aliquam. Fusce sit amet sapien pulvinar, dapibus turpis nec, imperdiet nibh. Ut et lacus sed velit condimentum tincidunt. Vivamus in turpis suscipit, euismod quam quis, porta sem. Integer lectus elit, sodales id sagittis ut, consequat a nisl. Nullam ut orci id lacus vestibulum cursus. Maecenas consequat ac nulla quis euismod. Nullam lacinia, justo sed venenatis scelerisque, nibh magna lobortis tellus, a luctus quam est eget mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Pellentesque libero justo, dignissim sit amet nulla luctus, maximus venenatis felis. Quisque sollicitudin dolor eu arcu vehicula ullamcorper. Fusce aliquet facilisis hendrerit. Sed mattis auctor leo, et volutpat augue. Duis pharetra eros ut tortor porta, in dictum metus lobortis. Nulla est arcu, rhoncus ac lobortis sed, ultrices ac neque. Aenean blandit mi ut malesuada venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac ultricies neque, vitae condimentum sem. Suspendisse sed lorem in est sagittis elementum venenatis id quam. In cursus arcu eu lacus varius, ut mollis nisi auctor. Suspendisse tincidunt mattis diam ac pulvinar. Quisque dui arcu, dapibus a commodo sed, aliquet et diam.</p><p>Pellentesque rutrum rhoncus ligula, ac dictum justo facilisis id. Suspendisse fermentum euismod ex in porttitor. Nulla pulvinar risus ac rhoncus bibendum. Phasellus at luctus ante. Vivamus id libero maximus, sagittis velit nec, interdum nulla. Nulla tincidunt, magna eget condimentum rhoncus, ipsum arcu faucibus nibh, sed tincidunt enim odio non metus. Phasellus justo elit, faucibus sit amet dictum in, laoreet vitae risus. Duis sem nibh, rutrum ut lorem vestibulum, posuere laoreet nisi. Quisque at elit pharetra, tempor enim sit amet, aliquam tellus.</p><p>Sed accumsan quam ornare congue convallis. Mauris eget velit elementum, tempor ipsum vel, scelerisque arcu. Phasellus eget eleifend sapien, ut lobortis magna. Nam posuere lorem sit amet erat hendrerit accumsan. Morbi viverra rutrum nulla. Suspendisse pharetra viverra velit. Pellentesque lobortis nulla vitae ante eleifend dapibus quis eget metus. In nisi neque, consectetur eget mollis a, convallis sit amet leo.</p>',
            'img' => 'http://forge.pinecove.com/wp-content/uploads/2016/07/forge-video-anvil-hammer-640x427.jpg'
        ],
        [
            'title' => 'Zgłoszenia na Szepty Nawiedzonych Krain dobiegają końca',
            'tags' => [
                'Szepty Nawiedzonych Krain', 'Warcraft', 'larp', 'zgłoszenia',
            ],
            'created_date' => '2018-04-24',
            'created_author' => 'Komzurak',
            'modified_date' => Null,
            'modified_author' => Null,
            'summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p>',
            'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p><p>Vestibulum porta ligula vitae aliquam pharetra. Nam in est ut eros mollis aliquam. Fusce sit amet sapien pulvinar, dapibus turpis nec, imperdiet nibh. Ut et lacus sed velit condimentum tincidunt. Vivamus in turpis suscipit, euismod quam quis, porta sem. Integer lectus elit, sodales id sagittis ut, consequat a nisl. Nullam ut orci id lacus vestibulum cursus. Maecenas consequat ac nulla quis euismod. Nullam lacinia, justo sed venenatis scelerisque, nibh magna lobortis tellus, a luctus quam est eget mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Pellentesque libero justo, dignissim sit amet nulla luctus, maximus venenatis felis. Quisque sollicitudin dolor eu arcu vehicula ullamcorper. Fusce aliquet facilisis hendrerit. Sed mattis auctor leo, et volutpat augue. Duis pharetra eros ut tortor porta, in dictum metus lobortis. Nulla est arcu, rhoncus ac lobortis sed, ultrices ac neque. Aenean blandit mi ut malesuada venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac ultricies neque, vitae condimentum sem. Suspendisse sed lorem in est sagittis elementum venenatis id quam. In cursus arcu eu lacus varius, ut mollis nisi auctor. Suspendisse tincidunt mattis diam ac pulvinar. Quisque dui arcu, dapibus a commodo sed, aliquet et diam.</p><p>Pellentesque rutrum rhoncus ligula, ac dictum justo facilisis id. Suspendisse fermentum euismod ex in porttitor. Nulla pulvinar risus ac rhoncus bibendum. Phasellus at luctus ante. Vivamus id libero maximus, sagittis velit nec, interdum nulla. Nulla tincidunt, magna eget condimentum rhoncus, ipsum arcu faucibus nibh, sed tincidunt enim odio non metus. Phasellus justo elit, faucibus sit amet dictum in, laoreet vitae risus. Duis sem nibh, rutrum ut lorem vestibulum, posuere laoreet nisi. Quisque at elit pharetra, tempor enim sit amet, aliquam tellus.</p><p>Sed accumsan quam ornare congue convallis. Mauris eget velit elementum, tempor ipsum vel, scelerisque arcu. Phasellus eget eleifend sapien, ut lobortis magna. Nam posuere lorem sit amet erat hendrerit accumsan. Morbi viverra rutrum nulla. Suspendisse pharetra viverra velit. Pellentesque lobortis nulla vitae ante eleifend dapibus quis eget metus. In nisi neque, consectetur eget mollis a, convallis sit amet leo.</p>',
            'img' => 'http://3.bp.blogspot.com/-7GR39dxC2Bw/U_NFa7EsnlI/AAAAAAAABT8/Ue_3CY4BvT0/s1600/WoWScrnShot_081114_183432.jpg'
        ],
    ];

    /**
     * Find all news.
     *
     * @return array Result
     */
    public function findAll()
    {
        return $this->news;
    }

    /**
     * Find single record by its id.
     *
     * @param integer $id Single record index
     *
     * @return array|null Result
     */
    public function findOneById($id)
    {
        return isset($this->news[$id]) && count($this->news)
            ? $this->news[$id] : null;
    }
}