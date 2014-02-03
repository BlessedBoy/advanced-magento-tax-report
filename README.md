Advanced Tax Report
===========================

Overview
---------------------------

Still work in progress, [Advanced Tax Report][1] is a very simple Magento extension. It adds a new custom tax report that shows tax amount, tax rate and total sales collected aggregated by city. It uses an admin grid to show the information to the user and can be configured through the Configuration section.

I started developing the extension to satisfy the requirements of a client. While trying to come with a suitable solution, though, I came to realize that there are not many free extensions --if any-- dealing with this kind of report. That's why I decided to share this solution. It is not complete by any means. Any suggestion on how to improve it or what to add to it is welcome. For details on how to do contribute keep reading. 

[1]:https://github.com/BlessedBoy/advanced-magento-tax-report "Click to view project on Github"

Authors
---------------------------
* Reydel Leon


How it works
---------------------------

The new report will show under Reports -> Sales and its called Advanced Tax Report.

Currently, I figures are pulled from tables: ```sales_flat_order```, ```sales_flat_order_address``` and ```sales_order_tax```. Only **processing** and **complete** orders are taken into account for the report and it is aggregated by city. The report can be filtered by state/province/region, or by city. It shows whatever information is stored in ```sales_order_tax.title``` as **county**, since it was intended for US. Theoretically, it can be used with any country, though I haven't had time or sample data to test this.

Ths extension has being tested in Magento versions **1.7** and **1.8** without issues. 

**Notice**: This extension creates the file structure ```Varien/Data/Collection/``` under **local** codepool. No core file is modified with this approach, but its your responsability to check for possible collisions with other extensions to avoid undesired effects.


Configuration
--------------------------
The extension have a configuration section. It allows Magento admin to select a default state/province/region to filter the report when its displayed. This filter can be removed once the report is initially displayed. You can choose to show or not the tax rate (per city) as you like. Finally, you can choose a time window if you only want to select data for an specific period. No validation has been added, so its up to you to put the correct values and not overlapping dates in the fileds. **NO DATA LOSS** will result from errors, but your report can show wrong or weird values.

Remember to save your configuration to apply the changes.

How to contribute
--------------------------
Everyone is welcome to contribute. To suggest improvements, report bugs or ask for a new feature, please, use Github issues.


TODO
--------------------------

* Verify that the tables used are the most adecuated
* Improve the join
* Offer the posibility of aggregation by state/province/region.
