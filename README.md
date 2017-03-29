# mptt-rule
Matching data with rule based on mptt

```sql
CREATE TABLE `tbl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',//rule name OR object name
  `value` blob NOT NULL,//rule value OR object value
  `op` varchar(255) NOT NULL DEFAULT '',//operation
  `lft` int(10) unsigned NOT NULL,//right value
  `rgt` int(10) unsigned NOT NULL,//left value 
  `lvl` int(10) unsigned NOT NULL,//tree level
  `add_time` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
``` 
