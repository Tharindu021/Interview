<?php
    function getTotalSlices($people, $slices_per_person)
    {
        return $people*$slices_per_person;
    }

    function getTotalCost($slices, $packages)
    {
        $package_prices = [];

        foreach($packages as $name => $package)
        {
            // round up to the nearest integer
            $cost = $package[0]*ceil($slices/$package[1]);
            $package_prices[$name] = $cost;
        }
        return $package_prices;
    }

    function getBestPackage($package_cost_array)
    {
        return array_search(min($package_cost_array), $package_cost_array);
    }

    $packages = array(
        "Small" => [15, 10],
        "Medium" => [25, 20],
        "Large" => [35, 30],
        "Extra Large" => [50, 50],
    );

    // get the total slices for all peoples
    $slices = getTotalSlices(20,3);
    print("Total Slices:" . $slices . "\n\n");

    // get the packages cost for slices
    $package_cost_array = getTotalCost($slices, $packages);
    //print the package details
    foreach ($package_cost_array as $name => $cost) {
        print($name. " Package: $" .$cost. "\n");
    }

    // get the minimum price package name
    $best_package_name = getBestPackage($package_cost_array);
    print("\n" .$best_package_name. " package is best value for the money.");
?>