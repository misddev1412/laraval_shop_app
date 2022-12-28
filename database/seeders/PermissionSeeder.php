<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Dashboard
            [
                'name' => 'Dashboard',
                'slug' => 'dashboard.index',
                'group_name' => 'dashboard'
            ],
            // User
            [
                'name' => 'User List',
                'slug' => 'user.index',
                'group_name' => 'user'
            ],
            [
                'name' => 'User Create',
                'slug' => 'user.create',
                'group_name' => 'user'
            ],
            [
                'name' => 'User Update',
                'slug' => 'user.update',
                'group_name' => 'user'
            ],
            [
                'name' => 'User Delete',
                'slug' => 'user.delete',
                'group_name' => 'user'
            ],
            [
                'name' => 'User Show',
                'slug' => 'user.show',
                'group_name' => 'user'
            ],
            [
                'name' => 'User Lock',
                'slug' => 'user.lock',
                'group_name' => 'user'
            ],
            [
                'name' => 'User Unlock',
                'slug' => 'user.unlock',
                'group_name' => 'user'
            ],
            [
                'name' => 'User Login As',
                'slug' => 'user.login_as',
                'group_name' => 'user'
            ],
            [
                'name' => 'User Role',
                'slug' => 'user.role',
                'group_name' => 'user'
            ],
            // Role
            [
                'name' => 'Role List',
                'slug' => 'role.index',
                'group_name' => 'role'
            ],
            [
                'name' => 'Role Create',
                'slug' => 'role.create',
                'group_name' => 'role'
            ],
            [
                'name' => 'Role Update',
                'slug' => 'role.update',
                'group_name' => 'role'
            ],
            [
                'name' => 'Role Delete',
                'slug' => 'role.delete',
                'group_name' => 'role'
            ],
            // Permission
            [
                'name' => 'Permission List',
                'slug' => 'permission.index',
                'group_name' => 'permission'
            ],
            [
                'name' => 'Permission Create',
                'slug' => 'permission.create',
                'group_name' => 'permission'
            ],
            [
                'name' => 'Permission Update',
                'slug' => 'permission.update',
                'group_name' => 'permission'
            ],
            [
                'name' => 'Permission Delete',
                'slug' => 'permission.delete',
                'group_name' => 'permission'
            ],
            // Post
            [
                'name' => 'Post List',
                'slug' => 'post.index',
                'group_name' => 'post'
            ],
            [
                'name' => 'Post Create',
                'slug' => 'post.create',
                'group_name' => 'post'
            ],
            [
                'name' => 'Post Update',
                'slug' => 'post.update',
                'group_name' => 'post'
            ],
            [
                'name' => 'Post Delete',
                'slug' => 'post.delete',
                'group_name' => 'post'
            ],
            [
                'name' => 'Post Publish',
                'slug' => 'post.publish',
                'group_name' => 'post'
            ],
            [
                'name' => 'Post Unpublish',
                'slug' => 'post.unpublish',
                'group_name' => 'post'
            ],
            [
                'name' => 'Post Export',
                'slug' => 'post.export',
                'group_name' => 'post'
            ],
            // Category
            [
                'name' => 'Category List',
                'slug' => 'category.index',
                'group_name' => 'category'
            ],
            [
                'name' => 'Category Create',
                'slug' => 'category.create',
                'group_name' => 'category'
            ],
            [
                'name' => 'Category Update',
                'slug' => 'category.update',
                'group_name' => 'category'
            ],
            [
                'name' => 'Category Delete',
                'slug' => 'category.delete',
                'group_name' => 'category'
            ],
            // Tag
            [
                'name' => 'Tag List',
                'slug' => 'tag.index',
                'group_name' => 'tag'
            ],
            [
                'name' => 'Tag Create',
                'slug' => 'tag.create',
                'group_name' => 'tag'
            ],
            [
                'name' => 'Tag Update',
                'slug' => 'tag.update',
                'group_name' => 'tag'
            ],
            [
                'name' => 'Tag Delete',
                'slug' => 'tag.delete',
                'group_name' => 'tag'
            ],
            // Comment
            [
                'name' => 'Comment List',
                'slug' => 'comment.index',
                'group_name' => 'comment'
            ],
            [
                'name' => 'Comment Create',
                'slug' => 'comment.create',
                'group_name' => 'comment'
            ],
            [
                'name' => 'Comment Update',
                'slug' => 'comment.update',
                'group_name' => 'comment'
            ],
            [
                'name' => 'Comment Delete',
                'slug' => 'comment.delete',
                'group_name' => 'comment'
            ],
            // Setting
            [
                'name' => 'Setting List',
                'slug' => 'setting.index',
                'group_name' => 'setting'
            ],
            [
                'name' => 'Setting Create',
                'slug' => 'setting.create',
                'group_name' => 'setting'
            ],
            [
                'name' => 'Setting Update',
                'slug' => 'setting.update',
                'group_name' => 'setting'
            ],
            [
                'name' => 'Setting Delete',
                'slug' => 'setting.delete',
                'group_name' => 'setting'
            ],
            // Media
            [
                'name' => 'Media List',
                'slug' => 'media.index',
                'group_name' => 'media'
            ],
            [
                'name' => 'Media Create',
                'slug' => 'media.create',
                'group_name' => 'media'
            ],
            [
                'name' => 'Media Update',
                'slug' => 'media.update',
                'group_name' => 'media'
            ],
            [
                'name' => 'Media Delete',
                'slug' => 'media.delete',
                'group_name' => 'media'
            ],
            // Menu
            [
                'name' => 'Menu List',
                'slug' => 'menu.index',
                'group_name' => 'menu'
            ],
            [
                'name' => 'Menu Create',
                'slug' => 'menu.create',
                'group_name' => 'menu'
            ],
            [
                'name' => 'Menu Update',
                'slug' => 'menu.update',
                'group_name' => 'menu'
            ],
            [
                'name' => 'Menu Delete',
                'slug' => 'menu.delete',
                'group_name' => 'menu'
            ],
            // Product
            [
                'name' => 'Product List',
                'slug' => 'product.index',
                'group_name' => 'product'
            ],
            [
                'name' => 'Product Create',
                'slug' => 'product.create',
                'group_name' => 'product'
            ],
            [
                'name' => 'Product Update',
                'slug' => 'product.update',
                'group_name' => 'product'
            ],
            [
                'name' => 'Product Delete',
                'slug' => 'product.delete',
                'group_name' => 'product'
            ],
            [
                'name' => 'Product Publish',
                'slug' => 'product.publish',
                'group_name' => 'product'
            ],
            [
                'name' => 'Product Unpublish',
                'slug' => 'product.unpublish',
                'group_name' => 'product'
            ],
            [
                'name' => 'Product Export',
                'slug' => 'product.export',
                'group_name' => 'product'
            ],
            // Revenue
            [
                'name' => 'Revenue List',
                'slug' => 'revenue.index',
                'group_name' => 'revenue'
            ],
            [
                'name' => 'Revenue Create',
                'slug' => 'revenue.create',
                'group_name' => 'revenue'
            ],
            [
                'name' => 'Revenue Update',
                'slug' => 'revenue.update',
                'group_name' => 'revenue'
            ],
            [
                'name' => 'Revenue Delete',
                'slug' => 'revenue.delete',
                'group_name' => 'revenue'
            ],
            // Order
            [
                'name' => 'Order List',
                'slug' => 'order.index',
                'group_name' => 'order'
            ],
            [
                'name' => 'Order Create',
                'slug' => 'order.create',
                'group_name' => 'order'
            ],
            [
                'name' => 'Order Update',
                'slug' => 'order.update',
                'group_name' => 'order'
            ],
            [
                'name' => 'Order Delete',
                'slug' => 'order.delete',
                'group_name' => 'order'
            ],
            // Voucher
            [
                'name' => 'Voucher List',
                'slug' => 'voucher.index',
                'group_name' => 'voucher'
            ],
            [
                'name' => 'Voucher Create',
                'slug' => 'voucher.create',
                'group_name' => 'voucher'
            ],
            [
                'name' => 'Voucher Update',
                'slug' => 'voucher.update',
                'group_name' => 'voucher'
            ],
            [
                'name' => 'Voucher Delete',
                'slug' => 'voucher.delete',
                'group_name' => 'voucher'
            ],
            // Variant
            [
                'name' => 'Variant List',
                'slug' => 'variant.index',
                'group_name' => 'variant'
            ],
            [
                'name' => 'Variant Create',
                'slug' => 'variant.create',
                'group_name' => 'variant'
            ],
            [
                'name' => 'Variant Update',
                'slug' => 'variant.update',
                'group_name' => 'variant'
            ],
            [
                'name' => 'Variant Delete',
                'slug' => 'variant.delete',
                'group_name' => 'variant'
            ],
            // Review
            [
                'name' => 'Review List',
                'slug' => 'review.index',
                'group_name' => 'review'
            ],
            [
                'name' => 'Review Create',
                'slug' => 'review.create',
                'group_name' => 'review'
            ],
            [
                'name' => 'Review Update',
                'slug' => 'review.update',
                'group_name' => 'review'
            ],
            [
                'name' => 'Review Delete',
                'slug' => 'review.delete',
                'group_name' => 'review'
            ],
            // Report
            [
                'name' => 'Report List',
                'slug' => 'report.index',
                'group_name' => 'report'
            ],
            [
                'name' => 'Report Create',
                'slug' => 'report.create',
                'group_name' => 'report'
            ],
            [
                'name' => 'Report Update',
                'slug' => 'report.update',
                'group_name' => 'report'
            ],
            [
                'name' => 'Report Delete',
                'slug' => 'report.delete',
                'group_name' => 'report'
            ],
            // Mail
            [
                'name' => 'Mail List',
                'slug' => 'mail.index',
                'group_name' => 'mail'
            ],
            [
                'name' => 'Mail Create',
                'slug' => 'mail.create',
                'group_name' => 'mail'
            ],
            [
                'name' => 'Mail Update',
                'slug' => 'mail.update',
                'group_name' => 'mail'
            ],
            [
                'name' => 'Mail Delete',
                'slug' => 'mail.delete',
                'group_name' => 'mail'
            ],
            // Notification
            [
                'name' => 'Notification List',
                'slug' => 'notification.index',
                'group_name' => 'notification'
            ],
            [
                'name' => 'Notification Create',
                'slug' => 'notification.create',
                'group_name' => 'notification'
            ],
            [
                'name' => 'Notification Update',
                'slug' => 'notification.update',
                'group_name' => 'notification'
            ],
            [
                'name' => 'Notification Delete',
                'slug' => 'notification.delete',
                'group_name' => 'notification'
            ],
            // Notification Template
            [
                'name' => 'Notification Template List',
                'slug' => 'notification_template.index',
                'group_name' => 'notification_template'
            ],
            [
                'name' => 'Notification Template Create',
                'slug' => 'notification_template.create',
                'group_name' => 'notification_template'
            ],
            [
                'name' => 'Notification Template Update',
                'slug' => 'notification_template.update',
                'group_name' => 'notification_template'
            ],
            [
                'name' => 'Notification Template Delete',
                'slug' => 'notification_template.delete',
                'group_name' => 'notification_template'
            ],
            // Inventory
            [
                'name' => 'Inventory List',
                'slug' => 'inventory.index',
                'group_name' => 'inventory'
            ],
            [
                'name' => 'Inventory Create',
                'slug' => 'inventory.create',
                'group_name' => 'inventory'
            ],
            [
                'name' => 'Inventory Update',
                'slug' => 'inventory.update',
                'group_name' => 'inventory'
            ],
            [
                'name' => 'Inventory Delete',
                'slug' => 'inventory.delete',
                'group_name' => 'inventory'
            ],
            // Address
            [
                'name' => 'Address List',
                'slug' => 'address.index',
                'group_name' => 'address'
            ],
            [
                'name' => 'Address Create',
                'slug' => 'address.create',
                'group_name' => 'address'
            ],
            [
                'name' => 'Address Update',
                'slug' => 'address.update',
                'group_name' => 'address'
            ],
            [
                'name' => 'Address Delete',
                'slug' => 'address.delete',
                'group_name' => 'address'
            ],
            // Country
            [
                'name' => 'Country List',
                'slug' => 'country.index',
                'group_name' => 'country'
            ],
            [
                'name' => 'Country Create',
                'slug' => 'country.create',
                'group_name' => 'country'
            ],
            [
                'name' => 'Country Update',
                'slug' => 'country.update',
                'group_name' => 'country'
            ],
            [
                'name' => 'Country Delete',
                'slug' => 'country.delete',
                'group_name' => 'country'
            ],
            // Admin Area
            [
                'name' => 'Admin Area List',
                'slug' => 'admin_area.index',
                'group_name' => 'admin_area'
            ],
            [
                'name' => 'Admin Area Create',
                'slug' => 'admin_area.create',
                'group_name' => 'admin_area'
            ],
            [
                'name' => 'Admin Area Update',
                'slug' => 'admin_area.update',
                'group_name' => 'admin_area'
            ],
            [
                'name' => 'Admin Area Delete',
                'slug' => 'admin_area.delete',
                'group_name' => 'admin_area'
            ],
            // Email Template
            [
                'name' => 'Email Template List',
                'slug' => 'email_template.index',
                'group_name' => 'email_template'
            ],
            [
                'name' => 'Email Template Create',
                'slug' => 'email_template.create',
                'group_name' => 'email_template'
            ],
            [
                'name' => 'Email Template Update',
                'slug' => 'email_template.update',
                'group_name' => 'email_template'
            ],
            [
                'name' => 'Email Template Delete',
                'slug' => 'email_template.delete',
                'group_name' => 'email_template'
            ],
            // Transaction
            [
                'name' => 'Transaction List',
                'slug' => 'transaction.index',
                'group_name' => 'transaction'
            ],
            [
                'name' => 'Transaction Create',
                'slug' => 'transaction.create',
                'group_name' => 'transaction'
            ],
            [
                'name' => 'Transaction Update',
                'slug' => 'transaction.update',
                'group_name' => 'transaction'
            ],
            [
                'name' => 'Transaction Delete',
                'slug' => 'transaction.delete',
                'group_name' => 'transaction'
            ],
            // Payment
            [
                'name' => 'Payment List',
                'slug' => 'payment.index',
                'group_name' => 'payment'
            ],
            [
                'name' => 'Payment Create',
                'slug' => 'payment.create',
                'group_name' => 'payment'
            ],
            [
                'name' => 'Payment Update',
                'slug' => 'payment.update',
                'group_name' => 'payment'
            ],
            [
                'name' => 'Payment Delete',
                'slug' => 'payment.delete',
                'group_name' => 'payment'
            ],
            // Payment Method
            [
                'name' => 'Payment Method List',
                'slug' => 'payment_method.index',
                'group_name' => 'payment_method'
            ],
            [
                'name' => 'Payment Method Create',
                'slug' => 'payment_method.create',
                'group_name' => 'payment_method'
            ],
            [
                'name' => 'Payment Method Update',
                'slug' => 'payment_method.update',
                'group_name' => 'payment_method'
            ],
            [
                'name' => 'Payment Method Delete',
                'slug' => 'payment_method.delete',
                'group_name' => 'payment_method'
            ],
            // Store
            [
                'name' => 'Store List',
                'slug' => 'store.index',
                'group_name' => 'store'
            ],
            [
                'name' => 'Store Create',
                'slug' => 'store.create',
                'group_name' => 'store'
            ],
            [
                'name' => 'Store Update',
                'slug' => 'store.update',
                'group_name' => 'store'
            ],
            [
                'name' => 'Store Delete',
                'slug' => 'store.delete',
                'group_name' => 'store'
            ],
            // Calendar
            [
                'name' => 'Calendar List',
                'slug' => 'calendar.index',
                'group_name' => 'calendar'
            ],
            [
                'name' => 'Calendar Create',
                'slug' => 'calendar.create',
                'group_name' => 'calendar'
            ],
            [
                'name' => 'Calendar Update',
                'slug' => 'calendar.update',
                'group_name' => 'calendar'
            ],
            [
                'name' => 'Calendar Delete',
                'slug' => 'calendar.delete',
                'group_name' => 'calendar'
            ],
            // Event
            [
                'name' => 'Event List',
                'slug' => 'event.index',
                'group_name' => 'event'
            ],
            [
                'name' => 'Event Create',
                'slug' => 'event.create',
                'group_name' => 'event'
            ],
            [
                'name' => 'Event Update',
                'slug' => 'event.update',
                'group_name' => 'event'
            ],
            [
                'name' => 'Event Delete',
                'slug' => 'event.delete',
                'group_name' => 'event'
            ],
            // Event Type
            [
                'name' => 'Event Type List',
                'slug' => 'event_type.index',
                'group_name' => 'event_type'
            ],
            [
                'name' => 'Event Type Create',
                'slug' => 'event_type.create',
                'group_name' => 'event_type'
            ],
            [
                'name' => 'Event Type Update',
                'slug' => 'event_type.update',
                'group_name' => 'event_type'
            ],
            [
                'name' => 'Event Type Delete',
                'slug' => 'event_type.delete',
                'group_name' => 'event_type'
            ],
            // Contact
            [
                'name' => 'Contact List',
                'slug' => 'contact.index',
                'group_name' => 'contact'
            ],
            [
                'name' => 'Contact Create',
                'slug' => 'contact.create',
                'group_name' => 'contact'
            ],
            [
                'name' => 'Contact Update',
                'slug' => 'contact.update',
                'group_name' => 'contact'
            ],
            [
                'name' => 'Contact Delete',
                'slug' => 'contact.delete',
                'group_name' => 'contact'
            ],
            // Log
            [
                'name' => 'Log List',
                'slug' => 'log.index',
                'group_name' => 'log'
            ],
            [
                'name' => 'Log Create',
                'slug' => 'log.create',
                'group_name' => 'log'
            ],
            [
                'name' => 'Log Update',
                'slug' => 'log.update',
                'group_name' => 'log'
            ],
            [
                'name' => 'Log Delete',
                'slug' => 'log.delete',
                'group_name' => 'log'
            ],
            // Order Item
            [
                'name' => 'Order Item List',
                'slug' => 'order_item.index',
                'group_name' => 'order_item'
            ],
            [
                'name' => 'Order Item Create',
                'slug' => 'order_item.create',
                'group_name' => 'order_item'
            ],
            [
                'name' => 'Order Item Update',
                'slug' => 'order_item.update',
                'group_name' => 'order_item'
            ],
            [
                'name' => 'Order Item Delete',
                'slug' => 'order_item.delete',
                'group_name' => 'order_item'
            ],
            // Question And Answer
            [
                'name' => 'Question And Answer List',
                'slug' => 'question_and_answer.index',
                'group_name' => 'question_and_answer'
            ],
            [
                'name' => 'Question And Answer Create',
                'slug' => 'question_and_answer.create',
                'group_name' => 'question_and_answer'
            ],
            [
                'name' => 'Question And Answer Update',
                'slug' => 'question_and_answer.update',
                'group_name' => 'question_and_answer'
            ],
            [
                'name' => 'Question And Answer Delete',
                'slug' => 'question_and_answer.delete',
                'group_name' => 'question_and_answer'
            ],
            // Guarantee
            [
                'name' => 'Guarantee List',
                'slug' => 'guarantee.index',
                'group_name' => 'guarantee'
            ],
            [
                'name' => 'Guarantee Create',
                'slug' => 'guarantee.create',
                'group_name' => 'guarantee'
            ],
            [
                'name' => 'Guarantee Update',
                'slug' => 'guarantee.update',
                'group_name' => 'guarantee'
            ],
            [
                'name' => 'Guarantee Delete',
                'slug' => 'guarantee.delete',
                'group_name' => 'guarantee'
            ],
            // Support
            [
                'name' => 'Support List',
                'slug' => 'support.index',
                'group_name' => 'support'
            ],
            [
                'name' => 'Support Create',
                'slug' => 'support.create',
                'group_name' => 'support'
            ],
            [
                'name' => 'Support Update',
                'slug' => 'support.update',
                'group_name' => 'support'
            ],
            [
                'name' => 'Support Delete',
                'slug' => 'support.delete',
                'group_name' => 'support'
            ],
            // Search Keyword
            [
                'name' => 'Search Keyword List',
                'slug' => 'search_keyword.index',
                'group_name' => 'search_keyword'
            ],
            [
                'name' => 'Search Keyword Create',
                'slug' => 'search_keyword.create',
                'group_name' => 'search_keyword'
            ],
            [
                'name' => 'Search Keyword Update',
                'slug' => 'search_keyword.update',
                'group_name' => 'search_keyword'
            ],
            [
                'name' => 'Search Keyword Delete',
                'slug' => 'search_keyword.delete',
                'group_name' => 'search_keyword'
            ],
            // Advertise
            [
                'name' => 'Advertise List',
                'slug' => 'advertise.index',
                'group_name' => 'advertise'
            ],
            [
                'name' => 'Advertise Create',
                'slug' => 'advertise.create',
                'group_name' => 'advertise'
            ],
            [
                'name' => 'Advertise Update',
                'slug' => 'advertise.update',
                'group_name' => 'advertise'
            ],
            [
                'name' => 'Advertise Delete',
                'slug' => 'advertise.delete',
                'group_name' => 'advertise'
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }
    }
}
