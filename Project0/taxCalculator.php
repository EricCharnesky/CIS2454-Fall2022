<?php
$gross_income = filter_input(INPUT_GET, 'gross_income', FILTER_VALIDATE_INT);
$total_deductions = filter_input(INPUT_GET, 'total_deductions', FILTER_VALIDATE_INT);
$name = htmlspecialchars(filter_input(INPUT_GET, 'name'));

if ($total_deductions < 12950) {
    $total_deductions = 12950;
}

$adjusted_gross_income = $gross_income - $total_deductions;

$taxes_owed_at_10_percent = 0;
$taxes_owed_at_12_percent = 0;
$taxes_owed_at_22_percent = 0;
$taxes_owed_at_24_percent = 0;
$taxes_owed_at_32_percent = 0;
$taxes_owed_at_35_percent = 0;
$taxes_owed_at_37_percent = 0;
$total_taxes_owed = 0;

$taxes_owed_as_percentage_of_gross_income = 0;
$taxes_owed_as_percentage_of_adjusted_gross_income = 0;

$START_OF_37_BRACKET = 539_900;
$START_OF_35_BRACKET = 215_950;
$START_OF_32_BRACKET = 170_050;
$START_OF_24_BRACKET = 89_075;
$START_OF_22_BRACKET = 41_775;
$START_OF_12_BRACKET = 10_275;
$START_OF_10_BRACKET = 0;

$income_to_be_taxed = $adjusted_gross_income;

if ($income_to_be_taxed > $START_OF_37_BRACKET) {
    $taxes_owed_at_37_percent = ( $income_to_be_taxed - $START_OF_37_BRACKET ) * .37;
    $income_to_be_taxed = $START_OF_37_BRACKET;
}

if ($income_to_be_taxed > $START_OF_35_BRACKET) {
    $taxes_owed_at_35_percent = ( $income_to_be_taxed - $START_OF_35_BRACKET ) * .35;
    $income_to_be_taxed = $START_OF_35_BRACKET;
}

if ($income_to_be_taxed > $START_OF_32_BRACKET) {
    $taxes_owed_at_32_percent = ( $income_to_be_taxed - $START_OF_32_BRACKET ) * .32;
    $income_to_be_taxed = $START_OF_32_BRACKET;
}

if ($income_to_be_taxed > $START_OF_24_BRACKET) {
    $taxes_owed_at_24_percent = ( $income_to_be_taxed - $START_OF_24_BRACKET ) * .24;
    $income_to_be_taxed = $START_OF_24_BRACKET;
}

if ($income_to_be_taxed > $START_OF_22_BRACKET) {
    $taxes_owed_at_22_percent = ( $income_to_be_taxed - $START_OF_22_BRACKET ) * .22;
    $income_to_be_taxed = $START_OF_22_BRACKET;
}

if ($income_to_be_taxed > $START_OF_12_BRACKET) {
    $taxes_owed_at_12_percent = ( $income_to_be_taxed - $START_OF_12_BRACKET ) * .12;
    $income_to_be_taxed = $START_OF_12_BRACKET;
}

if ($income_to_be_taxed > $START_OF_10_BRACKET) {
    $taxes_owed_at_10_percent = ( $income_to_be_taxed - $START_OF_10_BRACKET ) * .10;
    $income_to_be_taxed = $START_OF_10_BRACKET;
}

$total_taxes_owed = $taxes_owed_at_10_percent + $taxes_owed_at_12_percent +
        $taxes_owed_at_22_percent + $taxes_owed_at_24_percent + 
        $taxes_owed_at_32_percent + $taxes_owed_at_35_percent + 
        $taxes_owed_at_37_percent;


$taxes_owed_as_percentage_of_gross_income = $total_taxes_owed / $gross_income * 100;
$taxes_owed_as_percentage_of_adjusted_gross_income = $total_taxes_owed / $adjusted_gross_income * 100;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Tax Calculator Results for <?php echo $name ?> ( don't actually use this! )</h1>

        <span><?php
echo "Gross Income : $"
 . number_format($gross_income, 2)
?></span></br>
        <span><?php
            echo "Total Deductions : $"
            . number_format($total_deductions, 2)
            ?></span></br>
        <span><?php
            echo "Adusted Gross Income : $"
            . number_format($adjusted_gross_income, 2)
            ?></span></br>
        <span><?php
            echo "Taxes Owed at 10% bracket : $"
            . number_format($taxes_owed_at_10_percent, 2)
            ?></span></br>
        <span><?php
            echo "Taxes Owed at 12% bracket : $"
            . number_format($taxes_owed_at_12_percent, 2)
            ?></span></br>
        <span><?php
            echo "Taxes Owed at 22% bracket : $"
            . number_format($taxes_owed_at_22_percent, 2)
            ?></span></br>
        <span><?php
            echo "Taxes Owed at 24% bracket : $"
            . number_format($taxes_owed_at_24_percent, 2)
            ?></span></br>
        <span><?php
            echo "Taxes Owed at 32% bracket : $"
            . number_format($taxes_owed_at_32_percent, 2)
            ?></span></br>
        <span><?php
            echo "Taxes Owed at 35% bracket : $"
            . number_format($taxes_owed_at_35_percent, 2)
            ?></span></br>
        <span><?php
            echo "Taxes Owed at 37% bracket : $"
            . number_format($taxes_owed_at_37_percent, 2)
            ?></span></br>
        <span><?php
            echo "Total Taxes Owed : $"
            . number_format($total_taxes_owed, 2)
            ?></span></br>
        <span><?php
            echo "Taxes Owed as percentage of gross income: "
            . number_format($taxes_owed_as_percentage_of_gross_income, 2)
            . '%'
            ?></span></br>
        <span><?php
            echo "Taxes Owed as percentage of adjusted gross income: "
            . number_format($taxes_owed_as_percentage_of_adjusted_gross_income, 2)
            . '%'
            ?></span></br>

    </body>
</html>
