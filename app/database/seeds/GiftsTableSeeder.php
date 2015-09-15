<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GiftsTableSeeder extends Seeder {

	public function run()
	{
		for(i=0 ;i< 50; i++)
		{
			Gift::create([
				'topic_id'=>i+1,
				'title' => '新款阿登',
				'price' =>'999',
				'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
				'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
				'scan_num' => rand(1111,8888),
				'focus_num' => rand(1111,8888),
				'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
				}]);
			Gift::create([
				'topic_id'=>i+1,
				'title' => '新款阿登',
				'price' =>'999',
				'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
				'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
				'scan_num' => rand(1111,8888),
				'focus_num' => rand(1111,8888),
				'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
				]);

			Gift::create([
				'topic_id'=>i+1,
				'title' => '新款阿登',
				'price' =>'999',
				'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
				'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
				'scan_num' => rand(1111,8888),
				'focus_num' => rand(1111,8888),
				'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
				]);

			Gift::create([
				'topic_id'=>i+1,
				'title' => '新款阿登',
				'price' =>'999',
				'content' => 'live younger,you need it, trust me',
				'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
				'scan_num' => rand(1111,8888),
				'focus_num' => rand(1111,8888),
				'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
				]);

		}
		// Gift::create([
		// 	'topic_id'=>1,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>1,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>1,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>1,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => 'live younger,you need it, trust me',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>2,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>2,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>2,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>2,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => 'live younger,you need it, trust me',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>3,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>3,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>3,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>3,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => 'live younger,you need it, trust me',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>4,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>4,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>4,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => '床上总是很多零碎的杂物，不知道放在哪里。有了这个宿舍床头收纳架，就不怕床上没空间了。手机、水杯、充电器统统装得下，实用性强而且色彩明亮。舒服温馨的宿舍生活就靠它了。',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		// Gift::create([
		// 	'topic_id'=>4,
		// 	'title' => '新款阿登',
		// 	'price' =>'999',
		// 	'content' => 'live younger,you need it, trust me',
		// 	'gift_photo_intro' =>'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
		// 	'scan_num' => '7859',
		// 	'focus_num' => '7557',
		// 	'taobao_url' =>'https://detail.tmall.com/item.htm?spm=a217e.7765654.1998660470.7.a4lzKx&id=521089667043'
		// ]);

		
	}

}