<?php

function task1($filename)
{
    $fileData=file_get_contents($filename);
    $xml = new SimpleXMLElement($fileData);

    echo "<h3>PurchaseOrderNumber.</h3>" . $xml->attributes()->PurchaseOrderNumber . "<br>" . "<h3>OrderDate.</h3>"
        . $xml->attributes()->OrderDate . "<br>";

    foreach ($xml->Address as $address){
        echo "<h3>Address.</h3>" . "Type:" . $address->attributes()->Type . "<br>";
        echo "Name: " . $address->Name-> __toString() . "<br>";
        echo "Street: " . $address->Street->__toString() . "<br>";
        echo "City: " . $address->City->__toString() . "<br>";
        echo "State: " . $address->State->__toString() . "<br>";
        echo "Zip: " . $address->Zip->__toString() . "<br>";
        echo "Country: " . $address->Country->__toString() . "<br>";
    }
    foreach ($xml->DeliveryNotes as $deliveryNotes){
        echo "<h3>DeliveryNotes.</h3>" ;
        echo $deliveryNotes->__toString() . "<br>";
    }
    foreach ($xml->Items->Item as $item){
        echo "<h3>Item.</h3>";
        echo "PartNumber:" . $item->attributes()->PartNumber . "<br>";
        echo "ProductName:" . $item->ProductName->__toString() . "<br>";
        echo "Quantity:" . $item->Quantity->__toString() . "<br>";
        echo "USPrice:" . $item->USPrice->__toString() . "<br>";
        echo "ShipDate:" . $item->ShipDate->__toString() . "<br>";
        echo "Comment:" . $item->Comment->__toString() . "<br>";
    }

}