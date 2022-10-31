<?php

$demo_plan = app('rinvex.subscriptions.plan')->create([
    'name'             => 'Demo',
    'signup_fee'       => 0.00,
    'price'            => 0.00,
    'invoice_period'   => 2,
    'invoice_interval' => 'day',
    'currency'         => 'SAR',
]);

$demo_plan->features()->saveMany([
    new \Rinvex\Subscriptions\Models\PlanFeature(['name' => 'create_invoice_free', 'value' => '2147000000']),
    new \Rinvex\Subscriptions\Models\PlanFeature(['name' => 'issue_invoice_free' , 'value' => '2147000000']),
]);