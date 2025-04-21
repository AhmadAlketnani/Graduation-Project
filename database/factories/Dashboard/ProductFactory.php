<?php

namespace Database\Factories\Dashboard;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_en' => $this->faker->word(),
            'name_ar' => $this->faker->randomElement([
                'هاتف ذكي',
                'حاسوب محمول',
                'جهاز لوحي',
                'سماعات بلوتوث',
                'سماعات رأس',
                'ساعة ذكية',
                'كاميرا رقمية',
                'جهاز عرض (بروجكتور)',
                'جهاز بلايستيشن',
                'جهاز إكس بوكس',
                'ماوس لاسلكي',
                'لوحة مفاتيح ميكانيكية',
                'قرص صلب خارجي',
                'فلاش ميموري',
                'شاحن سريع',
                'باور بانك',
                'راوتر واي فاي',
                'مودم انترنت',
                'جهاز تتبع GPS',
                'نظارة واقع افتراضي',
                'ميكروفون احترافي',
                'سماعة مكالمات',
                'كاميرا ويب',
                'جهاز تسجيل صوت',
                'مكبر صوت بلوتوث',
                'جهاز تحكم عن بعد',
                'جهاز تبريد للابتوب',
                'قارئ بطاقات ذاكرة',
                'كاميرا مراقبة منزلية',
                'ريموت تلفاز ذكي',
                'تلفاز ذكي 4K',
                'جهاز استقبال قنوات',
                'محول HDMI',
                'طابعة ليزر',
                'ماسح ضوئي (سكانر)',
                'كابل USB-C',
                'محول كهربائي',
                'موزع USB',
                'لوحة رسومات رقمية',
                'قرص SSD داخلي',
                'قرص HDD داخلي',
                'مروحة تبريد للكمبيوتر',
                'وحدة تغذية كهربائية',
                'كرت شاشة',
                'معالج مركزي',
                'مذربورد',
                'ذاكرة RAM',
                'كاميرا أكشن',
                'ستاند موبايل',
                'حامل لابتوب'
            ]),

            'price' => $this->faker->randomFloat(2, 1, 100),
            'images' => collect(range(1, rand(2, 5)))->map(
                fn() =>
                $this->faker->imageUrl(640, 480, 'electronics', true)
            )->toArray(),
            'QTY' => $this->faker->numberBetween(1, 100),
            'description_en' => $this->faker->sentence(),
            'description_ar' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'store_id' => 1,
        ];
    }
}
