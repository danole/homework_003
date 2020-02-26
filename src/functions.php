<?php

function task1($filename)
{
    $fileData=file_get_contents($filename);
    $xml = new SimpleXMLElement($fileData);

    echo "<h3>PurchaseOrderNumber.</h3>" . $xml->attributes()->PurchaseOrderNumber . "<br>" . "<h3>OrderDate.</h3>"
        . $xml->attributes()->OrderDate . "<br>";

    foreach ($xml->Address as $address){
        echo "<h3>Address.</h3>" . "Type:" . $address->attributes()->Type . "<br>" .
            "Name: " . $address->Name-> __toString() . "<br>" . "Street: " . $address->Street->__toString() . "<br>" .
            "City: " . $address->City->__toString() . "<br>" . "State: " . $address->State->__toString() . "<br>" .
            "Zip: " . $address->Zip->__toString() . "<br>" . "Country: " . $address->Country->__toString() . "<br>";
    }
    foreach ($xml->DeliveryNotes as $deliveryNotes){
        echo "<h3>DeliveryNotes.</h3>" . $deliveryNotes->__toString() . "<br>";
    }
    foreach ($xml->Items->Item as $item){
        echo "<h3>Item.</h3>" . "PartNumber:" . $item->attributes()->PartNumber . "<br>" .
            "ProductName:" . $item->ProductName->__toString() . "<br>" .
            "Quantity:" . $item->Quantity->__toString() . "<br>" . "USPrice:" . $item->USPrice->__toString() . "<br>" .
            "ShipDate:" . $item->ShipDate->__toString() . "<br>" .  "Comment:" . $item->Comment->__toString() . "<br>";
    }
}

function task2()
{
    $user=[
        "name"=>"ILYA",
        "surname"=>"FROLOV",
        "city"=>"SPB",
        "country"=>"RUSSIA",
        "contacts"=>[
            "phone"=>"89745651349",
            "vk"=>"vk.com/id137247801"
        ]
    ];
    $json = json_encode($user);
    $file = fopen('output.json', 'w');
    fwrite($file,$json);
    fclose($file);

    if (rand(0,1)){
        $string = file_get_contents("output.json");
        $data = json_decode($string);
        if (rand(0,1)) {
            $data->name .= rand(0, 99);
        }
        if (rand(0,1)) {
        $data->surname.= rand(0,99);
        }
        if (rand(0,1)) {
        $data->city.= rand(0,99);
        }
        if (rand(0,1)) {
        $data->country.= rand(0,99);
        }
        if (rand(0,1)) {
        $data->contacts->phone.= rand(0,99);
        }
        if (rand(0,1)) {
        $data->contacts->vk.= rand(0,99);
        }
        $json = json_encode($data);
        $file = fopen('output2.json', 'w');
        fwrite($file,$json);
        fclose($file);
    }

    $string1 = file_get_contents("output.json");
    $output1=json_decode($string1);
    $string2 = file_get_contents("output2.json");
    $output2=json_decode($string2);
    if($output1->name!=$output2->name){
        echo "Name не совпадает. Name в output.json =" . $output1->name .
            ", а в output2.json = ". $output2->name . ".<br>";
    }
    if ($output1->surname!=$output2->surname){
        echo "Surname не совпадает. Surname в output.json =" . $output1->surname .
            ", а в output2.json = ". $output2->surname . ".<br>";
    }
    if ($output1->city!=$output2->city){
        echo "City не совпадает. City в output.json =" . $output1->city .
            ", а в output2.json = ". $output2->city . ".<br>";
    }
    if ($output1->country!=$output2->country){
        echo "Country не совпадает. Country в output.json =" . $output1->country .
            ", а в output2.json = ". $output2->country . ".<br>";
    }
    if ($output1->contacts->phone!=$output2->contacts->phone){
        echo "Phone не совпадает. Phone в output.json =" . $output1->contacts->phone .
            ", а в output2.json = ". $output2->contacts->phone . ".<br>";
    }
    if ($output1->contacts->vk!=$output2->contacts->vk){
        echo "VK не совпадает. VK в output.json =" . $output1->contacts->vk .
            ", а в output2.json = ". $output2->contacts->vk . ".<br>";
    }
}

function task3()
{
    $numbers=[];

    for($i=0;$i<=49;$i++){
        $numbers[$i]=array(rand(1,100));
    }

    $file = fopen('file.csv','w');

    foreach($numbers as $field){
        fputcsv($file,$field, ';');
    }

    fclose($file);

    $result=0;
    $handle = fopen("file.csv", "r");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]%2==0){
                $result+=$data[$i];
            }
        }
    }

    echo "Сумма четных чисел в файле file.csv равна " . $result;
    fclose($handle);
}

function task4()
{
    $url = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json';
    $string = file_get_contents($url);
    $data = json_decode($string);

    echo "page_id = " . $data->query->pages->{15580374}->pageid . ";<br>";
    echo "title = " . $data->query->pages->{15580374}->title . ";<br>";
}


