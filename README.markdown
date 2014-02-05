# Occitech Magento Installer

# WARNING VERY EARLY RELEASE

## Installation

### Composer

```json
{
  "repositories": [
    {
      "type": "composer",
      "url": "http://packages.firegento.com"
    }
  ],
  "require": {
    "occitech/magento-installer": "dev-master"
  },
  "extra": {
    "magento-root-dir": "htdocs/" // or whatever directory you want
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
          <module>Vendor_Module</module>
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

```php
<?php

try {
  $installer = $this;
  $installer->startSetup();

  $installer->createProductAttributeSet('New attribute set'); // Creates a new attribute set
  $installer->createProductAttributeSet('New attribute set from Default', 'Default'); // create a new attribute set inheriting from the "Default" attribute set

  $installer->endSetup();
} catch(Exception $e) {
  Mage::log($e->getMessage());
}
```

### Create CMS Block(s)

```php
<?php

try {
  $installer = $this;
  $installer->startSetup();

  // Create multiple blocks
  $installer->createCMSBlocks(array(
    array(
      'title' => 'Title Block 1',
      'identifier' => 'block_1',
      'content' => 'Content block 1',
    ),
    array(
      'title' => 'Title Block 2',
      'identifier' => 'block_2',
      'content' => 'Content block 2',
    ),
  ));

  // Create single block
  $installer->createCMSBlock(array(
    'title' => 'Title Block 3',
    'identifier' => 'block_3',
    'content' => 'Content block 3',
  ));

  $installer->endSetup();
} catch(Exception $e) {
  Mage::log($e->getMessage());
}
```

### Create CMS Page(s)

```php
<?php

try {
  $installer = $this;
  $installer->startSetup();

  // Create multiple pages
  $installer->createCMSPages(array(
    array(
      'title' => 'Title Page 1',
      'identifier' => 'page_1',
      'content' => 'Content page 1',
    ),
    array(
      'title' => 'Title Page 2',
      'identifier' => 'page_2',
      'content' => 'Content page 2',
    ),
  ));

  // Create single page
  $installer->createCMSPage(array(
    'title' => 'Title Page 3',
    'identifier' => 'page_3',
    'content' => 'Content page 3',
  ));

  $installer->endSetup();
} catch(Exception $e) {
  Mage::log($e->getMessage());
}
```

### Update CMS Page

```php
<?php

try {
  $installer = $this;
  $installer->startSetup();

  // update page with "home" identifier
  $installer->updateCMSPage('home', array(
    'title' => 'New title'
  ));

  $installer->endSetup();
} catch(Exception $e) {
  Mage::log($e->getMessage());
}
```

### Fetch CMS item from it's identifier

```php
<?php

try {
  $installer = $this;
  $installer->startSetup();

  // fetch page with "home" identifier
  $page = $installer->getCMSPage('home');

  // fetch block with "block_1" identifier
  $page = $installer->getCMSPage('block_1');

  $installer->endSetup();
} catch(Exception $e) {
  Mage::log($e->getMessage());
}
```
