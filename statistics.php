<?php
session_start();
require_once('connect.php');

// Fetch monthly budget
$budget_query = "SELECT budget FROM budgets WHERE month = MONTH(CURDATE()) AND year = YEAR(CURDATE()) LIMIT 1";
$budget_result = mysqli_query($conn, $budget_query);
$budget_row = mysqli_fetch_assoc($budget_result);
$monthly_budget = $budget_row['budget'] ?? 0;

// Calculate total spent
$spent_query = "SELECT SUM(amount) as total_spent FROM expenses WHERE MONTH(expense_date) = MONTH(CURDATE())";
$spent_result = mysqli_query($conn, $spent_query);
$spent_row = mysqli_fetch_assoc($spent_result);
$total_spent = $spent_row['total_spent'] ?? 0;

// Money left calculation
$money_left = $monthly_budget - $total_spent;

// Fetch categorized expenses
$category_query = "SELECT category, SUM(amount) as total FROM expenses WHERE MONTH(expense_date) = MONTH(CURDATE()) GROUP BY category";
$category_result = mysqli_query($conn, $category_query);
$categories = [];
while ($row = mysqli_fetch_assoc($category_result)) {
    $categories[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Statistics</title>   
    <style> .statistics-month,
.statistics-month * {
    box-sizing: border-box;
}

.statistics-month {
    background: #f9fbf8;
    height: 1176px;
    position: relative;
    overflow-x: auto;
}

.rectangle-111 {
    background: #44bf99;
    border-radius: 25px;
    width: 1065px;
    height: 563px;
    position: absolute;
    left: 195px;
    top: 600px;
}

.rectangle-107 {
    background: #d4f4e4;
    border-radius: 15px;
    width: 325px;
    height: 427px;
    position: absolute;
    left: 211px;
    top: 708px;
}

.rectangle-108 {
    background: #d4f4e4;
    border-radius: 15px;
    width: 325px;
    height: 427px;
    position: absolute;
    left: 568px;
    top: 708px;
}

.rectangle-109 {
    background: #d4f4e4;
    border-radius: 15px;
    width: 325px;
    height: 427px;
    position: absolute;
    left: 925px;
    top: 708px;
}

.line-3 {
    margin-top: -1px;
    border-style: solid;
    border-color: #959997;
    border-width: 1px 0 0 0;
    width: 1106.03px;
    height: 0px;
    position: absolute;
    left: 176px;
    top: 208px;
    transform-origin: 0 0;
    transform: rotate(0deg) scale(1, 1);
}

.statistics {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 28px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    position: absolute;
    left: 208px;
    top: 57px;
    width: 172px;
    height: 33px;
}

.check-monthly-report {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Light', sans-serif;
    font-size: 17px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 300;
    text-decoration: underline;
    position: absolute;
    left: 1036px;
    top: 61px;
    width: 198px;
    height: 20px;
}

.spent-so-far {
    color: #ffffff;
    text-align: center;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 25px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    position: absolute;
    left: 576px;
    top: 650px;
    width: 317px;
    height: 30px;
}

.budget-this-month {
    color: #000000;
    text-align: left;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 28px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    position: absolute;
    left: 206px;
    top: 156px;
    width: 340px;
    height: 26px;
}

.expenses {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 22px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    position: absolute;
    left: 289px;
    top: 736px;
    width: 169px;
    height: 26px;
}

.total {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 20px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    position: absolute;
    left: 241px;
    top: 1073px;
    width: 77px;
    height: 26px;
}

.total2 {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 20px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    position: absolute;
    left: 602px;
    top: 1072px;
    width: 77px;
    height: 26px;
}

.total3 {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 20px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    position: absolute;
    left: 961px;
    top: 1073px;
    width: 77px;
    height: 26px;
}

.bills {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 22px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    position: absolute;
    left: 646px;
    top: 736px;
    width: 169px;
    height: 26px;
}

.needs-wants {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 22px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    position: absolute;
    left: 1003px;
    top: 736px;
    width: 169px;
    height: 26px;
}

.rectangle-112 {
    background: #ffffff;
    border-radius: 5px;
    width: 86px;
    height: 42px;
    position: absolute;
    left: 241px;
    top: 800px;
}

.rectangle-120 {
    background: #ffffff;
    border-radius: 5px;
    width: 86px;
    height: 42px;
    position: absolute;
    left: 603px;
    top: 800px;
}

.rectangle-128 {
    background: #ffffff;
    border-radius: 5px;
    width: 86px;
    height: 42px;
    position: absolute;
    left: 960px;
    top: 800px;
}

.rectangle-122 {
    background: #ffffff;
    border-radius: 5px;
    width: 86px;
    height: 42px;
    position: absolute;
    left: 603px;
    top: 868px;
}

.rectangle-130 {
    background: #ffffff;
    border-radius: 5px;
    width: 86px;
    height: 42px;
    position: absolute;
    left: 960px;
    top: 868px;
}

.rectangle-132 {
    background: #ffffff;
    border-radius: 5px;
    width: 86px;
    height: 42px;
    position: absolute;
    left: 960px;
    top: 936px;
}

.rectangle-134 {
    background: #ffffff;
    border-radius: 5px;
    width: 86px;
    height: 42px;
    position: absolute;
    left: 960px;
    top: 1004px;
}

.rectangle-124 {
    background: #ffffff;
    border-radius: 5px;
    width: 86px;
    height: 42px;
    position: absolute;
    left: 603px;
    top: 936px;
}

.rectangle-126 {
    background: #ffffff;
    border-radius: 5px;
    width: 86px;
    height: 42px;
    position: absolute;
    left: 603px;
    top: 1004px;
}

.rectangle-114 {
    background: #ffffff;
    border-radius: 5px;
    width: 86px;
    height: 42px;
    position: absolute;
    left: 241px;
    top: 868px;
}

.rectangle-115 {
    background: #ffffff;
    border-radius: 5px;
    width: 83px;
    height: 42px;
    position: absolute;
    left: 241px;
    top: 936px;
}

.rectangle-116 {
    background: #ffffff;
    border-radius: 5px;
    width: 83px;
    height: 42px;
    position: absolute;
    left: 241px;
    top: 1004px;
}

.rectangle-113 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 337px;
    top: 800px;
}

.rectangle-121 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 699px;
    top: 800px;
}

.rectangle-129 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 1056px;
    top: 800px;
}

.rectangle-131 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 1056px;
    top: 868px;
}

.rectangle-133 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 1056px;
    top: 936px;
}

.rectangle-135 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 1056px;
    top: 1004px;
}

.rectangle-123 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 699px;
    top: 868px;
}

.rectangle-125 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 699px;
    top: 936px;
}

.rectangle-127 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 699px;
    top: 1004px;
}

.rectangle-117 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 337px;
    top: 868px;
}

.rectangle-118 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 337px;
    top: 936px;
}

.rectangle-119 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 337px;
    top: 1004px;
}

.rectangle-137 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 337px;
    top: 1061px;
}

.rectangle-138 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 699px;
    top: 1061px;
}

.rectangle-139 {
    background: #ffffff;
    border-radius: 5px;
    width: 160px;
    height: 42px;
    position: absolute;
    left: 1056px;
    top: 1061px;
}

.food {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 12px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 243px;
    top: 812px;
    width: 65px;
    height: 26px;
}

.water {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 16px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 613px;
    top: 811px;
    width: 65px;
    height: 26px;
}

.transportation {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 10px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 243px;
    top: 880px;
    width: 82px;
    height: 21px;
}

.electricity {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 10px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 605px;
    top: 880px;
    width: 82px;
    height: 21px;
}

.savings {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 12px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 962px;
    top: 811px;
    width: 82px;
    height: 21px;
}

.emergency-funds {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 10px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 962px;
    top: 869px;
    width: 82px;
    height: 39px;
}

.investments {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 10px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 962px;
    top: 947px;
    width: 82px;
    height: 19px;
}

.personal-care {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 10px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 962px;
    top: 1014px;
    width: 82px;
    height: 19px;
}

.gas {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 10px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 605px;
    top: 948px;
    width: 82px;
    height: 21px;
}

.debt {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 10px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 605px;
    top: 1014px;
    width: 82px;
    height: 21px;
}

.eating-out {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 12px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 244px;
    top: 947px;
    width: 78px;
    height: 30px;
}

.mobile-load {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 12px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 241px;
    top: 1015px;
    width: 83px;
    height: 32px;
}

._2-110 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 349px;
    top: 812px;
    width: 98px;
    height: 17px;
}

._680 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 711px;
    top: 812px;
    width: 98px;
    height: 17px;
}

._1-700 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 1074px;
    top: 812px;
    width: 98px;
    height: 17px;
}

._2-250 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 1074px;
    top: 880px;
    width: 98px;
    height: 17px;
}

._2-000 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 1074px;
    top: 948px;
    width: 98px;
    height: 17px;
}

._1-050 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 1074px;
    top: 1016px;
    width: 98px;
    height: 17px;
}

._7-000 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 1074px;
    top: 1073px;
    width: 98px;
    height: 17px;
}

._3-700 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 711px;
    top: 880px;
    width: 98px;
    height: 17px;
}

._3-320 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 714px;
    top: 948px;
    width: 98px;
    height: 17px;
}

._2-850 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 714px;
    top: 1016px;
    width: 98px;
    height: 17px;
}

._10-550 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 711px;
    top: 1071px;
    width: 98px;
    height: 17px;
}

._810 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 349px;
    top: 880px;
    width: 98px;
    height: 17px;
}

._2-360 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 349px;
    top: 948px;
    width: 98px;
    height: 17px;
}

._399 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 349px;
    top: 1016px;
    width: 98px;
    height: 17px;
}

._5-679 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 349px;
    top: 1073px;
    width: 98px;
    height: 17px;
}

.rectangle-136 {
    background: #d4f4e4;
    width: 1106px;
    height: 325px;
    position: absolute;
    left: 176px;
    top: 247px;
}

.line-32 {
    margin-top: -1px;
    border-style: solid;
    border-color: #959997;
    border-width: 1px 0 0 0;
    width: 1106px;
    height: 0px;
    position: absolute;
    left: 176px;
    top: 109px;
}

.rectangle-91 {
    background: #44bf99;
    width: 177px;
    height: 1176px;
    position: absolute;
    left: -1px;
    top: 0px;
}

.budget-settings {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    text-decoration: underline;
    position: absolute;
    left: 15px;
    top: 137px;
    width: 173px;
    height: 20px;
}

.goals {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 36px;
    top: 180px;
    width: 57px;
    height: 18px;
}

.other-features {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 29px;
    top: 252px;
    width: 126px;
    height: 20px;
}

.target {
    width: 25px;
    height: 24px;
    position: absolute;
    left: 11px;
    top: 176px;
    overflow: visible;
}

.settings {
    width: 24px;
    height: 24px;
    position: absolute;
    left: 13px;
    top: 134px;
    overflow: visible;
}

.make-cents-logo-1-2 {
    width: 151px;
    height: 132px;
    position: absolute;
    left: 17px;
    top: 11px;
    object-fit: cover;
}

.total-spent-so-far {
    color: #000000;
    text-align: left;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 24px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    position: absolute;
    left: 228px;
    top: 286px;
    width: 280px;
    height: 26px;
}

.money-left {
    color: #000000;
    text-align: left;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 24px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    position: absolute;
    left: 228px;
    top: 350px;
    width: 175px;
    height: 26px;
}

._23-229 {
    color: #be0909;
    text-align: left;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 28px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    text-decoration: underline;
    position: absolute;
    left: 536px;
    top: 286px;
    width: 119px;
    height: 26px;
}

._2-381 {
    color: #44bf99;
    text-align: left;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 28px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    text-decoration: underline;
    position: absolute;
    left: 450px;
    top: 350px;
    width: 96px;
    height: 26px;
}

._25-610 {
    color: #44bf99;
    text-align: left;
    font-family: 'Montserrat-Bold', sans-serif;
    font-size: 28px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 700;
    position: absolute;
    left: 569px;
    top: 156px;
    width: 119px;
    height: 26px;
}

.rectangle-158 {
    background: #ffffff;
    border-radius: 15px;
    width: 997px;
    height: 117px;
    position: absolute;
    left: 228px;
    top: 414px;
}

.tip {
    color: #000000;
    text-align: left;
    font-family: 'Inter-Bold', sans-serif;
    font-size: 15px;
    font-weight: 700;
    position: absolute;
    left: 257px;
    top: 431px;
    width: 139px;
    height: 18px;
}

.you-should-focus-on-putting-more-of-your-money-on-your-savings-account-while-putting-all-your-money-in-the-bank-is-great-you-should-leave-some-savings-in-a-piggy-bank-so-you-have-access-to-your-finances-quickly-when-an-emergency-arises {
    color: #000000;
    text-align: left;
    font-family: 'Inter-Medium', sans-serif;
    font-size: 15px;
    font-weight: 500;
    position: absolute;
    left: 257px;
    top: 466px;
    width: 939px;
    height: 36px;
}

.statistics2 {
    color: #000000;
    text-align: center;
    font-family: 'Montserrat-Medium', sans-serif;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: 0.25px;
    font-weight: 500;
    position: absolute;
    left: 38px;
    top: 217px;
    width: 80px;
    height: 21px;
}

.vector {
    width: 1.72%;
    height: 1.97%;
    position: absolute;
    right: 97.19%;
    left: 1.09%;
    bottom: 80.08%;
    top: 17.94%;
    overflow: visible;
}

.image-removebg-preview-9-1 {
    width: 23px;
    height: 24px;
    position: absolute;
    left: 239px;
    top: 425px;
    object-fit: cover;
}</style>
</head>
<body>
<div class="statistics-month">
    <div class="rectangle-111">
    </div>
    <div class="rectangle-107">
    </div>
    <div class="rectangle-108">
    </div>
    <div class="rectangle-109">
    </div>
    <div class="line-3">
    </div>
    <div class="statistics"> STATISTICS </div>
    <div class="check-monthly-report"> Check Monthly Report </div>
    <div class="spent-so-far"> SPENT SO FAR </div>
    <div class="budget-this-month"> BUDGET THIS MONTH: </div>
    <div class="budget-this-month"> BUDGET THIS MONTH: </div>
    <div class="expenses"> Expenses: </div>
    <div class="total"> TOTAL: </div>
    <div class="total2"> TOTAL: </div>
    <div class="total3"> TOTAL: </div>
    <div class="bills"> Bills: </div>
    <div class="needs-wants"> Needs/Wants: </div>
    <div class="rectangle-112">
    </div>
    <div class="rectangle-120">
    </div>
    <div class="rectangle-128">
    </div>
    <div class="rectangle-122">
    </div>
    <div class="rectangle-130">
    </div>
    <div class="rectangle-132">
    </div>
    <div class="rectangle-134">
    </div>
    <div class="rectangle-124">
    </div>
    <div class="rectangle-126">
    </div>
    <div class="rectangle-114">
    </div>
    <div class="rectangle-115">
    </div>
    <div class="rectangle-116">
    </div>
    <div class="rectangle-113">
    </div>
    <div class="rectangle-121">
    </div>
    <div class="rectangle-129">
    </div>
    <div class="rectangle-131">
    </div>
    <div class="rectangle-133">
    </div>
    <div class="rectangle-135">
    </div>
    <div class="rectangle-123">
    </div>
    <div class="rectangle-125">
    </div>
    <div class="rectangle-127">
    </div>
    <div class="rectangle-117">
    </div>
    <div class="rectangle-118">
    </div>
    <div class="rectangle-119">
    </div>
    <div class="rectangle-137">
    </div>
    <div class="rectangle-138">
    </div>
    <div class="rectangle-139">
    </div>
    <div class="food"> Food: </div>
    <div class="water"> Water: </div>
    <div class="transportation"> Transportation: </div>
    <div class="electricity"> Electricity: </div>
    <div class="savings"> Savings: </div>
    <div class="emergency-funds"> Emergency<br />Funds: </div>
    <div class="investments"> Investments: </div>
    <div class="personal-care"> Personal Care: </div>
    <div class="gas"> Gas: </div>
    <div class="debt"> Debt: </div>
    <div class="eating-out"> Eating Out: </div>
    <div class="mobile-load"> Mobile Load: </div>
    <div class="_2-110"> ₱2,110 </div>
    <div class="_680"> ₱680 </div>
    <div class="_1-700"> ₱1,700 </div>
    <div class="_2-250"> ₱2,250 </div>
    <div class="_2-000"> ₱2,000 </div>
    <div class="_1-050"> ₱1,050 </div>
    <div class="_7-000"> ₱7,000 </div>
    <div class="_3-700"> ₱3,700 </div>
    <div class="_3-320"> ₱3,320 </div>
    <div class="_2-850"> ₱2,850 </div>
    <div class="_10-550"> ₱10,550 </div>
    <div class="_810"> ₱810 </div>
    <div class="_2-360"> ₱2,360 </div>
    <div class="_399"> ₱399 </div>
    <div class="_5-679"> ₱5,679 </div>
    <div class="rectangle-136">
    </div>
    <div class="line-32">
    </div>
    <div class="rectangle-91">
    </div>
    <div class="budget-settings"> Budget Settings </div>
    <div class="goals"> Goals </div>
    <div class="other-features"> Other Features </div><svg class="target" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12.4999 22C18.2529 22 22.9166 17.5228 22.9166 12C22.9166 6.47715 18.2529 2 12.4999 2C6.74695 2 2.08325 6.47715 2.08325 12C2.08325 17.5228 6.74695 22 12.4999 22Z" stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M12.4999 18C15.9517 18 18.7499 15.3137 18.7499 12C18.7499 8.68629 15.9517 6 12.4999 6C9.04814 6 6.24992 8.68629 6.24992 12C6.24992 15.3137 9.04814 18 12.4999 18Z" stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M12.4999 14C13.6505 14 14.5833 13.1046 14.5833 12C14.5833 10.8954 13.6505 10 12.4999 10C11.3493 10 10.4166 10.8954 10.4166 12C10.4166 13.1046 11.3493 14 12.4999 14Z" stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    <svg class="settings" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M9.24995 22L8.84995 18.8C8.63328 18.7167 8.42912 18.6167 8.23745 18.5C8.04578 18.3833 7.85828 18.2583 7.67495 18.125L4.69995 19.375L1.94995 14.625L4.52495 12.675C4.50828 12.5583 4.49995 12.4458 4.49995 12.3375V11.6625C4.49995 11.5542 4.50828 11.4417 4.52495 11.325L1.94995 9.375L4.69995 4.625L7.67495 5.875C7.85828 5.74167 8.04995 5.61667 8.24995 5.5C8.44995 5.38333 8.64995 5.28333 8.84995 5.2L9.24995 2H14.75L15.15 5.2C15.3666 5.28333 15.5708 5.38333 15.7625 5.5C15.9541 5.61667 16.1416 5.74167 16.325 5.875L19.3 4.625L22.05 9.375L19.475 11.325C19.4916 11.4417 19.5 11.5542 19.5 11.6625V12.3375C19.5 12.4458 19.4833 12.5583 19.45 12.675L22.025 14.625L19.275 19.375L16.325 18.125C16.1416 18.2583 15.95 18.3833 15.75 18.5C15.55 18.6167 15.35 18.7167 15.15 18.8L14.75 22H9.24995ZM11 20H12.975L13.325 17.35C13.8416 17.2167 14.3208 17.0208 14.7625 16.7625C15.2041 16.5042 15.6083 16.1917 15.975 15.825L18.45 16.85L19.425 15.15L17.275 13.525C17.3583 13.2917 17.4166 13.0458 17.45 12.7875C17.4833 12.5292 17.5 12.2667 17.5 12C17.5 11.7333 17.4833 11.4708 17.45 11.2125C17.4166 10.9542 17.3583 10.7083 17.275 10.475L19.425 8.85L18.45 7.15L15.975 8.2C15.6083 7.81667 15.2041 7.49583 14.7625 7.2375C14.3208 6.97917 13.8416 6.78333 13.325 6.65L13 4H11.025L10.675 6.65C10.1583 6.78333 9.67912 6.97917 9.23745 7.2375C8.79578 7.49583 8.39162 7.80833 8.02495 8.175L5.54995 7.15L4.57495 8.85L6.72495 10.45C6.64162 10.7 6.58328 10.95 6.54995 11.2C6.51662 11.45 6.49995 11.7167 6.49995 12C6.49995 12.2667 6.51662 12.525 6.54995 12.775C6.58328 13.025 6.64162 13.275 6.72495 13.525L4.57495 15.15L5.54995 16.85L8.02495 15.8C8.39162 16.1833 8.79578 16.5042 9.23745 16.7625C9.67912 17.0208 10.1583 17.2167 10.675 17.35L11 20ZM12.05 15.5C13.0166 15.5 13.8416 15.1583 14.525 14.475C15.2083 13.7917 15.55 12.9667 15.55 12C15.55 11.0333 15.2083 10.2083 14.525 9.525C13.8416 8.84167 13.0166 8.5 12.05 8.5C11.0666 8.5 10.2375 8.84167 9.56245 9.525C8.88745 10.2083 8.54995 11.0333 8.54995 12C8.54995 12.9667 8.88745 13.7917 9.56245 14.475C10.2375 15.1583 11.0666 15.5 12.05 15.5Z" fill="#1D1B20" />
    </svg>
    <img class="make-cents-logo-1-2" src="images/logo.png" />
    <div class="total-spent-so-far"> TOTAL SPENT (so far): </div>
    <div class="money-left"> MONEY LEFT: </div>
    <div class="_23-229"> ₱23,229 </div>
    <div class="_2-381"> ₱2,381 </div>
    <div class="_25-610"> ₱25,610 </div>
    <div class="rectangle-158">
    </div>
    <div class="tip"> TIP: </div>
    <div class="you-should-focus-on-putting-more-of-your-money-on-your-savings-account-while-putting-all-your-money-in-the-bank-is-great-you-should-leave-some-savings-in-a-piggy-bank-so-you-have-access-to-your-finances-quickly-when-an-emergency-arises"> You should focus on putting more of your money on your savings account. While putting all your money in the bank is great, you should leave some savings in a piggy bank so you have access to your finances quickly when an emergency arises. </div>
    <div class="statistics2"> Statistics </div><svg class="vector" width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 12.6679H1C0.4 12.6679 0 13.0901 0 13.7235V22.1688C0 22.8022 0.4 23.2244 1 23.2244H5C5.6 23.2244 6 22.8022 6 22.1688V13.7235C6 13.0901 5.6 12.6679 5 12.6679ZM21 8.44524H17C16.4 8.44524 16 8.86751 16 9.5009V22.1688C16 22.8022 16.4 23.2244 17 23.2244H21C21.6 23.2244 22 22.8022 22 22.1688V9.5009C22 8.86751 21.6 8.44524 21 8.44524ZM13 0H9C8.4 0 8 0.422262 8 1.05566V22.1688C8 22.8022 8.4 23.2244 9 23.2244H13C13.6 23.2244 14 22.8022 14 22.1688V1.05566C14 0.422262 13.6 0 13 0Z" fill="black" fill-opacity="0.58" />
    </svg>
    <img class="image-removebg-preview-9-1" src="image-removebg-preview-9-10.png" />
</div>

<script>
    function showMonthlyReport() {
        window.location.href = 'monthly_report.php';
    }
</script>
</body>
</html>
