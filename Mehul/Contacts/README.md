# About
This is a Magento 2 - Module with CRUD operation, listing and configuration setting.

# Requirements

- This module is compatible with commnity edition 2.4.5, not testing in other edition

# Installation

- To copy the module contents under app/code/ folder.

- Execute below commands
        php bin/magento setup:upgrade
        php bin/magento setup:di:compile
        php bin/magento setup:static-content:deploy -f
        php bin/magento c:c
        php bin/magento c:f
