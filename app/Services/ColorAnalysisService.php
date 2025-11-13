<?php

namespace App\Services;

class ColorAnalysisService
{
    /**
     * Get available skin tones
     *
     * @return array
     */
    public function getSkinTones()
    {
        return [
            ['code' => 'tone-1', 'hex' => '#F5D5C5', 'name' => 'Very Light'],
            ['code' => 'tone-2', 'hex' => '#E8B89A', 'name' => 'Light'],
            ['code' => 'tone-3', 'hex' => '#D4A574', 'name' => 'Light Medium'],
            ['code' => 'tone-4', 'hex' => '#C19560', 'name' => 'Medium'],
            ['code' => 'tone-5', 'hex' => '#B4855C', 'name' => 'Medium Tan'],
            ['code' => 'tone-6', 'hex' => '#D8A66F', 'name' => 'Light Warm'],
            ['code' => 'tone-7', 'hex' => '#C9996B', 'name' => 'Medium Warm'],
            ['code' => 'tone-8', 'hex' => '#8B5A2B', 'name' => 'Deep Brown'],
            ['code' => 'tone-9', 'hex' => '#E8C4A8', 'name' => 'Light Beige'],
            ['code' => 'tone-10', 'hex' => '#D4B598', 'name' => 'Medium Beige'],
            ['code' => 'tone-11', 'hex' => '#D8A882', 'name' => 'Tan'],
            ['code' => 'tone-12', 'hex' => '#C29568', 'name' => 'Medium Tan'],
            ['code' => 'tone-13', 'hex' => '#B88B6C', 'name' => 'Dark Tan'],
            ['code' => 'tone-14', 'hex' => '#A87B5A', 'name' => 'Deep Tan'],
        ];
    }

    /**
     * Get undertone options for specific step
     *
     * @param int $step
     * @return array|null
     */
    public function getUndertoneOptions($step)
    {
        $options = [
            1 => [
                ['code' => 'orange', 'hex' => '#FF6B35', 'name' => 'Orange'],
                ['code' => 'pink', 'hex' => '#FF1493', 'name' => 'Pink']
            ],
            2 => [
                ['code' => 'gold', 'hex' => '#FFD700', 'name' => 'Gold'],
                ['code' => 'silver', 'hex' => '#C0C0C0', 'name' => 'Silver']
            ],
            3 => [
                ['code' => 'brown', 'hex' => '#6B4423', 'name' => 'Brown'],
                ['code' => 'black', 'hex' => '#000000', 'name' => 'Black']
            ]
        ];

        return $options[$step] ?? null;
    }

    /**
     * Analyze color type based on undertones
     *
     * @param array $undertones
     * @return string
     */
    public function analyzeColorType($undertones)
    {
        $warmIndicators = ['orange', 'gold', 'brown'];
        $coolIndicators = ['pink', 'silver', 'black'];
        
        $warmCount = 0;
        $coolCount = 0;

        foreach ($undertones as $undertone) {
            if (in_array($undertone, $warmIndicators)) {
                $warmCount++;
            } elseif (in_array($undertone, $coolIndicators)) {
                $coolCount++;
            }
        }

        // Determine color type
        if ($warmCount > $coolCount) {
            return 'WARM';
        } elseif ($coolCount > $warmCount) {
            return 'COOL';
        } else {
            return 'NEUTRAL';
        }
    }

    /**
     * Get product recommendations based on color type
     *
     * @param string $colorType
     * @return array
     */
    public function getRecommendations($colorType)
    {
        $recommendations = [
            'WARM' => [
                'season' => 'Autumn/Spring',
                'code' => '#11C',
                'description' => 'PINK FAIR',
                'colors' => [
                    'best' => ['#FFC0CB', '#90EE90', '#FFA500', '#FFB6C1', '#9370DB', '#F5DEB3', '#98FB98', '#FFA07A', '#FF69B4', '#FFD700'],
                    'avoid' => ['#000000', '#FFFFFF', '#808080', '#0000FF']
                ],
                'foundation' => [
                    'product' => 'Colorfit Perfect Glow Cushion',
                    'finish' => 'Smooth glow finish',
                    'description' => 'For warm undertones'
                ],
                'eyeshadow' => [
                    'product' => 'Exclusive Eyeshadow',
                    'shade' => '01 Sunset Brown',
                    'colors' => ['#E8B4A0', '#D4A184', '#B8866A', '#8B5A3C', '#6B4423', '#4A2F1F', '#8B7355', '#A0826D']
                ],
                'blush' => [
                    [
                        'product' => 'Colorfit Cream Blush',
                        'shades' => [
                            ['number' => '01', 'name' => 'Sand Coral', 'image' => 'sand-coral.jpg'],
                            ['number' => '02', 'name' => 'Merry Mauve', 'image' => 'merry-mauve.jpg']
                        ]
                    ],
                    [
                        'product' => 'Exclusive Blush On',
                        'shade' => '02 Coral Peach'
                    ]
                ],
                'lipsticks' => [
                    [
                        'product' => 'Wardah Matte Lip Cream',
                        'shades' => [
                            ['number' => '01', 'name' => 'See You Latte', 'hex' => '#D4A184'],
                            ['number' => '05', 'name' => 'Feeling Red', 'hex' => '#C41E3A'],
                            ['number' => '14', 'name' => 'Peach of Mind', 'hex' => '#FFB366']
                        ]
                    ],
                    [
                        'product' => 'Wardah Glasting Liquid Lip',
                        'shades' => [
                            ['number' => '03', 'name' => 'Candid Coral', 'hex' => '#FF6F61'],
                            ['number' => '04', 'name' => 'Rosewood Radiance', 'hex' => '#B76E79'],
                            ['number' => '06', 'name' => 'Rouge Hora', 'hex' => '#8B0000']
                        ]
                    ],
                    [
                        'product' => 'Moist Dew Tint',
                        'shades' => [
                            ['number' => '01', 'name' => 'Peach Cream', 'hex' => '#FFDAB9'],
                            ['number' => '03', 'name' => 'Cherry Dream', 'hex' => '#DE3163'],
                            ['number' => '05', 'name' => 'Caramel Brûlée', 'hex' => '#C68642']
                        ]
                    ],
                    [
                        'product' => 'Colorfit Velvet Matte Lip Mousse',
                        'shades' => [
                            ['number' => '02', 'name' => 'Choco Glimmer', 'hex' => '#7B3F00'],
                            ['number' => '04', 'name' => 'Dewy Dust', 'hex' => '#E4C9B8'],
                            ['number' => '06', 'name' => 'Beyond Sunset', 'hex' => '#FF4500']
                        ]
                    ]
                ]
            ],
            'COOL' => [
                'season' => 'Summer/Winter',
                'code' => '#11C',
                'description' => 'ROSE FAIR',
                'colors' => [
                    'best' => ['#E6E6FA', '#00CED1', '#DA70D6', '#87CEEB', '#BA55D3', '#48D1CC', '#DDA0DD', '#20B2AA', '#FFB6C1', '#4169E1'],
                    'avoid' => ['#FFA500', '#FFD700', '#FF8C00', '#D2691E']
                ],
                'foundation' => [
                    'product' => 'Colorfit Perfect Glow Cushion',
                    'finish' => 'Smooth glow finish',
                    'description' => 'For cool undertones'
                ],
                'eyeshadow' => [
                    'product' => 'Exclusive Eyeshadow',
                    'shade' => '02 Berry Romance',
                    'colors' => ['#E8B4D0', '#D4A1B4', '#B88696', '#8B5A6C', '#6B4453', '#4A2F3F', '#8B7385', '#A0826D']
                ],
                'blush' => [
                    [
                        'product' => 'Colorfit Cream Blush',
                        'shade' => '02 Merry Mauve'
                    ],
                    [
                        'product' => 'Exclusive Blush On',
                        'shade' => '01 Pink Glow'
                    ]
                ],
                'lipsticks' => [
                    [
                        'product' => 'Wardah Matte Lip Cream',
                        'shades' => [
                            ['number' => '02', 'name' => 'Oh So Nude!', 'hex' => '#E5B8A7'],
                            ['number' => '05', 'name' => 'Feeling Red', 'hex' => '#C41E3A'],
                            ['number' => '10', 'name' => 'Pinky Plummy', 'hex' => '#C154C1']
                        ]
                    ],
                    [
                        'product' => 'Wardah Glasting Liquid Lip',
                        'shades' => [
                            ['number' => '01', 'name' => 'Berry Sorbet', 'hex' => '#C71585'],
                            ['number' => '04', 'name' => 'Rosewood Radiance', 'hex' => '#B76E79'],
                            ['number' => '05', 'name' => 'Mauve Muse', 'hex' => '#E0B0FF']
                        ]
                    ]
                ]
            ],
            'NEUTRAL' => [
                'season' => 'Universal',
                'code' => '#11C',
                'description' => 'NEUTRAL BEIGE',
                'colors' => [
                    'best' => ['#FFB6C1', '#90EE90', '#87CEEB', '#FFD700', '#DDA0DD', '#F5DEB3', '#48D1CC', '#FFA07A', '#BA55D3', '#98FB98'],
                    'avoid' => []
                ],
                'lipsticks' => [
                    [
                        'product' => 'Wardah Matte Lip Cream',
                        'shades' => [
                            ['number' => '01', 'name' => 'See You Latte', 'hex' => '#D4A184'],
                            ['number' => '05', 'name' => 'Feeling Red', 'hex' => '#C41E3A'],
                            ['number' => '11', 'name' => 'Rose To The Occasion', 'hex' => '#FF69B4']
                        ]
                    ]
                ]
            ]
        ];

        return $recommendations[$colorType] ?? $recommendations['WARM'];
    }
}