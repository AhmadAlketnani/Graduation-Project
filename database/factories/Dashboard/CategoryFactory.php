<?php

namespace Database\Factories\Dashboard;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dashboard\Category>
 */
class CategoryFactory extends Factory
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
                'الهواتف الذكية',
                'الحواسيب المحمولة',
                'الأجهزة اللوحية',
                'السماعات والإكسسوارات الصوتية',
                'الساعات الذكية',
                'الكاميرات الرقمية',
                'ألعاب الفيديو والأجهزة',
                'ملحقات الكمبيوتر',
                'أجهزة التخزين',
                'معدات الشبكات',
                'الواقع الافتراضي والمعزز',
                'الأجهزة الذكية المنزلية',
                'الطابعات والماسحات',
                'الكابلات والمحولات',
                'الطاقة والشحن',
                'الشاشات والتلفزيونات',
                'معدات التصوير والبث',
                'الإلكترونيات القابلة للارتداء',
                'أنظمة الأمن والمراقبة',
                'قطع غيار الحاسوب'
            ]),

            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}
