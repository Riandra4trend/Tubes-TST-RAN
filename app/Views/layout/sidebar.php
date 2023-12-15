<?php
// Assuming this is your CodeIgniter controller or model
defined('BASEPATH');

// Define the sidebar data


// Load the view file and pass data to it


// Make sure to replace 'your_view_name' with the actual name of your view file.
?>


<div class="z-[99999] hidden lg:flex flex-col bg-[#B7F2D4] w-72 fixed h-full">
    <!-- <div class="flex justify-center py-8 ">
            <img src="/next.svg" alt="logo" width="100" height="100">
        </div> -->
    <div class=" flex flex-col gap-6 mt-20">

        <div class="font-bold flex px-8 text-gray-700">General</div>

        <div class="flex items-center px-6 py-4 rounded-full transition bg-[#D5F8E5] hover:bg-gray-300 w-60 ml-6 cursor-pointer"
            onClick="window.location.href='dashboard'">
            <img src="/icon/dashboard.svg" alt="x">
            <div class="text-xl ml-5 text-black">Dashboard</div>
        </div>


        <div class="flex items-center px-6 py-4 rounded-full transition bg-[#D5F8E5] hover:bg-gray-300 w-60 ml-6 cursor-pointer"
            onClick="window.location.href='restock'">
            <img src="/icon/restock.svg" alt="x">
            <div class="text-xl ml-5 text-black">Iventory</div>
        </div>


        <div class="flex items-center px-6 py-4 rounded-full transition bg-[#D5F8E5] hover:bg-gray-300 w-60 ml-6 cursor-pointer"
            onClick="window.location.href='historyRestock'">
            <img src="/icon/historyRestock.svg" alt="x">
            <div class="text-xl ml-5 text-black">Restock</div>
        </div>

        <div class="flex items-center px-6 py-4 rounded-full transition bg-[#D5F8E5] hover:bg-gray-300 w-60 ml-6 cursor-pointer"
            onClick="window.location.href='historyPurchase'">
            <img src="/icon/purchase.svg" alt="x">
            <div class="text-xl ml-5 text-black">Purchase</div>
        </div>

    </div>


    <div class="mt-64">
        <div class=" my-auto flex items-center px-6 py-4 rounded-full transition bg-red-600 hover:bg-red-800 w-60 ml-6 cursor-pointer"
            onClick="window.location.href='logout'">
            <?php // Add your PHP logic for signOut() function ?>
            <img src="/icon/logout.svg" alt="logout">
            <div class="mr-5 text-xl text-black">Logout</div>
        </div>
    </div>
</div>