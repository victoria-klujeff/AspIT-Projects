   M S B A M L   `   `   `  ����>  :GUI, Version=1.0.0.0, Culture=neutral, PublicKeyToken=nullclr-namespace:GUIGUI  5   	       GUI.MainWindow   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   #localclr-namespace:GUI     5   	     � Icon$+  %pack://application:,,,/Image/Logo.jpg��5   	    � Title$ Luxury Yacht Diesel��5	   	   $	��550��6%   $	��850��62    � 
ResizeMode$ NoResize=�5
   	   .��5      � -   5         �Name$ MainGrid��5      .+�5   
   �� $��1q�6   .@�5      �� $�� Salg af DIESEL��6    �� 
IsSelected .  {�5      �� *
tabItems+.��5      � -   5        $ 	SalesGrid��5      
�������6*   5      �� 5      $��Kunde��6   {�5      �� *
tabItems+.��5      � -   5        $ CustomerGrid��5      
�������6-   5      �� 5      $��Leverandør��6   {�5      �� *
tabItems+.��5      � -   5        $ SupplierGrid��5      
�������6-   5      �� 5      -   5        $��dagsPris��5      $��Dagspris��5      {�.  5      �� *
tabPrice+.��5      � -   5        $ DailyPriceGrid��5      
�������6/   5      5       5"      5#      