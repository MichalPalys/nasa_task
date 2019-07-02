Information
===
The application has two default commands:
* **FIRST**
```bash 
$ bin/console app:get-holidays-list
```
with optional option `--year` default is `2018`,
which save to database all Polish Holidays by year.
#
* **SECOND**
```bash
$ bin/console app:get-nasa-images
```
with optional option `--year` default is `2018`,
which save to database nasa image data related with Polish Holidays.
#
And two endpoints:
```bash
$ ../api/list
```
EXAMPLE QUERIES
* `../api/list?date=2018-01-01`
* `../api/list?from=2018-06-01&to=2018-11-20`
* `../api/list?rover=Curiosity&camera=FHAZ`
* `../api/list?rover=Curiosity`
* `../api/list?camera=FHAZ`
* `../api/list`
#
and
```bash
$ ../api/photos/{$nasaId}
```
EXAMPLE QUERIES
* `../api/photos/532090`