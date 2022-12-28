<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_TYPE') === 'ELECTRONIC') {
            $dataNeedToSave = [
                [
                    'code' => 'CPU',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'CPU',
                            'description' => 'CPU'
                        ]
                    ]
                ],
                [
                    'code' => 'RAM',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'RAM',
                            'description' => 'RAM'
                        ]
                    ]
                ],
                [
                    'code' => 'STORAGE_HDD',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Storage HDD',
                            'description' => 'Storage HDD'
                        ]
                    ]
                ],
                [
                    'code' => 'STORAGE_SSD',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Storage SSD',
                            'description' => 'Storage SSD'
                        ]
                    ]
                ],
                [
                    'code' => 'SCREEN_SIZE',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Screen Size',
                            'description' => 'Screen Size'
                        ]
                    ]
                ],
                [
                    'code' => 'SCREEN_RESOLUTION',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Screen Resolution',
                            'description' => 'Screen Resolution'
                        ]
                    ]
                ],
                [
                    'code' => 'OPERATING_SYSTEM',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Operating System',
                            'description' => 'Operating System'
                        ]
                    ]
                ],
                [
                    'code' => 'GRAPHIC_CARD',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Graphic Card',
                            'description' => 'Graphic Card'
                        ]
                    ]
                ],
                [
                    'code' => 'WEIGHT',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Weight',
                            'description' => 'Weight'
                        ]
                    ]
                ],
                [
                    'code' => 'BATTERY',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Battery',
                            'description' => 'Battery'
                        ]
                    ]
                ],
                [
                    'code' => 'MACHINE_STATUS',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Machine Status',
                            'description' => 'Machine Status'
                        ]
                    ]
                ],
                [
                    'code' => 'WARRANTY',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Warranty',
                            'description' => 'Warranty'
                        ]
                    ]
                ],
                [
                    'code' => 'BRAND',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Brand',
                            'description' => 'Brand'
                        ]
                    ]
                ],
                [
                    'code' => 'MODEL',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Model',
                            'description' => 'Model'
                        ]
                    ]
                ],
                [
                    'code' => 'COLOR',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Color',
                            'description' => 'Color'
                        ]
                    ]
                ],
                [
                    'code' => 'CONDITION',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Condition',
                            'description' => 'Condition'
                        ]
                    ]
                ],
                [
                    'code' => 'PSU',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'PSU',
                            'description' => 'PSU'
                        ]
                    ]
                ],
                [
                    'code' => 'VGA',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'VGA',
                            'description' => 'VGA'
                        ]
                    ]
                ],
                [
                    'code' => 'CASE',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Case',
                            'description' => 'Case'
                        ]
                    ]
                ],
                [
                    'code' => 'MAIN_BOARD',
                    'scope' => 'PRODUCT',
                    'type' => 'TEXT',
                    'attribute_groups' => [
                        [
                            'group' => 'ELECTRONIC',
                            'status' => 'ACTIVE'
                        ]
                    ],
                    'attribute_translations' => [
                        [
                            'locale' => 'en',
                            'name' => 'Main Board',
                            'description' => 'Main Board'
                        ]
                    ]

                ]
            ];

            foreach ($dataNeedToSave as $data) {
                $dataAttribute = array_diff_key($data, ['attribute_groups' => '', 'attribute_translations' => '']);
                $attribute = Attribute::firstOrCreate($dataAttribute);
                foreach ($data['attribute_groups'] as $dataAttributeGroup) {
                    $attribute->attributeGroups()->firstOrCreate($dataAttributeGroup);
                }
                foreach ($data['attribute_translations'] as $dataAttributeTranslation) {
                    $attribute->attributeTranslations()->firstOrCreate($dataAttributeTranslation);
                }

            }
        }
    }
}
