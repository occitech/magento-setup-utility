# Occitech Magento Installer

# WARNING VERY EARLY RELEASE

## Installation

### Composer

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/occitech/magento-installer"
    },
    {
      "type": "composer",
      "url": "http://packages.firegento.com"
    }
  ],
  "require": {
    "occitech/magento-installer": "dev-develop"
  }
}
```

Make your module depends on `Occitech_Installer`:

```xml
<?xml version="1.0"?>
<!-- app/etc/modules/Your_Module.xml -->
<config>
  <modules>
    <Your_Module>
      <active>true</active>
      <codePool>local</codePool>
      <depends>
        <Occitech_Installer/>
      </depends>
    </Your_Module>
  </modules>
</config>
```

Finally, tell your module to use `Occitech_Installer`'s setup class:

```xml
<?xml version="1.0" encoding="utf-8"?>
<!-- app/code/{pool}/{Vendor}/{Module}/etc/config.xml -->
<config>
  <global>
    <resources>
      <vendor_module>
        <setup>
          <module>Occitech_Installer</module>
          <class>Occitech_Installer_Model_Resource_Setup</class>
        </setup>
      </vendor_module>
    </resources>
  </global>
</config>
```

Note: You can also use your own Setup and extend
`Occitech_Installer_Model_Resource_Setup`

## Features

### Create product attribute set

To create an attribute set, simply call

```php
<?php

try {
  $installer = $this;

  $installer->createProductAttributeSet('New attribute set'); // Creates a new attribute set
  $installer->createProductAttributeSet('New attribute set from Default', 'Default'); // create a new attribute set inheriting from the "Default" attribute set
} catch(Exception $e) {
  Mage::log($e->getMessage());
}
```
