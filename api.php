{
"swagger": "2.0",
"info": {
"title": "web_project",
"description": "API generated with [PHP-CRUD-API](https://github.com/mevdschee/php-crud-api)",
"version": "1.0.0"
},
"host": "localhost:8001",
"basePath": "/api.php",
"schemes": [
"http"
],
"consumes": [
"application/json"
],
"produces": [
"application/json"
],
"tags": [
{
"name": "rss_sources",
"description": ""
},
{
"name": "rss_feeds",
"description": ""
}
],
"paths": {
"/rss_sources": {
"get": {
"tags": [
"rss_sources"
],
"summary": "List",
"parameters": [
{
"name": "exclude",
"in": "query",
"description": "One or more related entities (comma separated).",
"required": false,
"type": "string"
},
{
"name": "include",
"in": "query",
"description": "One or more related entities (comma separated).",
"required": false,
"type": "string"
},
{
"name": "order",
"in": "query",
"description": "Column you want to sort on and the sort direction (comma separated). Example: id,desc",
"required": false,
"type": "string"
},
{
"name": "page",
"in": "query",
"description": "Page number and page size (comma separated). NB: You cannot use \"page\" without \"order\"! Example: 1,10",
"required": false,
"type": "string"
},
{
"name": "transform",
"in": "query",
"description": "Transform the records to object format. NB: This can also be done client-side in JavaScript!",
"required": false,
"type": "boolean"
},
{
"name": "columns",
"in": "query",
"description": "The table columns you want to retrieve (comma separated). Example: posts.*,categories.name",
"required": false,
"type": "string"
},
{
"name": "filter[]",
"in": "query",
"description": "Filters to be applied. Each filter consists of a column, an operator and a value (comma separated). Example: id,eq,1",
"required": false,
"type": "array",
"collectionFormat": "multi",
"items": {
"type": "string"
}
},
{
"name": "satisfy",
"in": "query",
"description": "Should all filters match (default)? Or any?",
"required": false,
"type": "string",
"enum": [
"any"
]
}
],
"responses": {
"200": {
"description": "An array of rss_sources",
"schema": {
"type": "object",
"properties": {
"rss_sources": {
"type": "array",
"items": {
"type": "object",
"properties": {
"id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false,
"x-primary-key": true
},
"name": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"link": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"added_date": {
"type": "string",
"x-dbtype": "timestamp",
"x-nullable": false,
"default": "current_timestamp()"
},
"updated_data": {
"type": "string",
"x-dbtype": "timestamp",
"x-nullable": false,
"default": "'0000-00-00 00:00:00'"
},
"status": {
"type": "integer",
"x-dbtype": "tinyint",
"x-nullable": false,
"default": 0
}
}
}
}
}
}
}
}
},
"post": {
"tags": [
"rss_sources"
],
"summary": "Create",
"parameters": [
{
"name": "item",
"in": "body",
"description": "Item to create.",
"required": true,
"schema": {
"type": "object",
"required": [
"id",
"name",
"link"
],
"properties": {
"id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false,
"x-primary-key": true
},
"name": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"link": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"added_date": {
"type": "string",
"x-dbtype": "timestamp",
"x-nullable": false,
"default": "current_timestamp()"
},
"updated_data": {
"type": "string",
"x-dbtype": "timestamp",
"x-nullable": false,
"default": "'0000-00-00 00:00:00'"
},
"status": {
"type": "integer",
"x-dbtype": "tinyint",
"x-nullable": false,
"default": 0
}
}
}
}
],
"responses": {
"200": {
"description": "Identifier of created item.",
"schema": {
"type": "integer"
}
}
}
}
},
"/rss_sources/{id}": {
"get": {
"tags": [
"rss_sources"
],
"summary": "Read",
"parameters": [
{
"name": "id",
"in": "path",
"description": "Identifier for item.",
"required": true,
"type": "string"
}
],
"responses": {
"200": {
"description": "The requested item.",
"schema": {
"type": "object",
"properties": {
"id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false,
"x-primary-key": true
},
"name": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"link": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"added_date": {
"type": "string",
"x-dbtype": "timestamp",
"x-nullable": false,
"default": "current_timestamp()"
},
"updated_data": {
"type": "string",
"x-dbtype": "timestamp",
"x-nullable": false,
"default": "'0000-00-00 00:00:00'"
},
"status": {
"type": "integer",
"x-dbtype": "tinyint",
"x-nullable": false,
"default": 0
}
}
}
}
}
},
"put": {
"tags": [
"rss_sources"
],
"summary": "Update",
"parameters": [
{
"name": "id",
"in": "path",
"description": "Identifier for item.",
"required": true,
"type": "string"
},
{
"name": "item",
"in": "body",
"description": "Properties of item to update.",
"required": true,
"schema": {
"type": "object",
"required": [
"id",
"name",
"link"
],
"properties": {
"id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false,
"x-primary-key": true
},
"name": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"link": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"added_date": {
"type": "string",
"x-dbtype": "timestamp",
"x-nullable": false,
"default": "current_timestamp()"
},
"updated_data": {
"type": "string",
"x-dbtype": "timestamp",
"x-nullable": false,
"default": "'0000-00-00 00:00:00'"
},
"status": {
"type": "integer",
"x-dbtype": "tinyint",
"x-nullable": false,
"default": 0
}
}
}
}
],
"responses": {
"200": {
"description": "Number of affected rows.",
"schema": {
"type": "integer"
}
}
}
},
"delete": {
"tags": [
"rss_sources"
],
"summary": "Delete",
"parameters": [
{
"name": "id",
"in": "path",
"description": "Identifier for item.",
"required": true,
"type": "string"
}
],
"responses": {
"200": {
"description": "Number of affected rows.",
"schema": {
"type": "integer"
}
}
}
},
"patch": {
"tags": [
"rss_sources"
],
"summary": "Increment",
"parameters": [
{
"name": "id",
"in": "path",
"description": "Identifier for item.",
"required": true,
"type": "string"
},
{
"name": "item",
"in": "body",
"description": "Properties of item to update.",
"required": true,
"schema": {
"type": "object",
"required": [
"id",
"name",
"link"
],
"properties": {
"id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false,
"x-primary-key": true
},
"name": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"link": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"added_date": {
"type": "string",
"x-dbtype": "timestamp",
"x-nullable": false,
"default": "current_timestamp()"
},
"updated_data": {
"type": "string",
"x-dbtype": "timestamp",
"x-nullable": false,
"default": "'0000-00-00 00:00:00'"
},
"status": {
"type": "integer",
"x-dbtype": "tinyint",
"x-nullable": false,
"default": 0
}
}
}
}
],
"responses": {
"200": {
"description": "Number of affected rows.",
"schema": {
"type": "integer"
}
}
}
}
},
"/rss_feeds": {
"get": {
"tags": [
"rss_feeds"
],
"summary": "List",
"parameters": [
{
"name": "exclude",
"in": "query",
"description": "One or more related entities (comma separated).",
"required": false,
"type": "string"
},
{
"name": "include",
"in": "query",
"description": "One or more related entities (comma separated).",
"required": false,
"type": "string"
},
{
"name": "order",
"in": "query",
"description": "Column you want to sort on and the sort direction (comma separated). Example: id,desc",
"required": false,
"type": "string"
},
{
"name": "page",
"in": "query",
"description": "Page number and page size (comma separated). NB: You cannot use \"page\" without \"order\"! Example: 1,10",
"required": false,
"type": "string"
},
{
"name": "transform",
"in": "query",
"description": "Transform the records to object format. NB: This can also be done client-side in JavaScript!",
"required": false,
"type": "boolean"
},
{
"name": "columns",
"in": "query",
"description": "The table columns you want to retrieve (comma separated). Example: posts.*,categories.name",
"required": false,
"type": "string"
},
{
"name": "filter[]",
"in": "query",
"description": "Filters to be applied. Each filter consists of a column, an operator and a value (comma separated). Example: id,eq,1",
"required": false,
"type": "array",
"collectionFormat": "multi",
"items": {
"type": "string"
}
},
{
"name": "satisfy",
"in": "query",
"description": "Should all filters match (default)? Or any?",
"required": false,
"type": "string",
"enum": [
"any"
]
}
],
"responses": {
"200": {
"description": "An array of rss_feeds",
"schema": {
"type": "object",
"properties": {
"rss_feeds": {
"type": "array",
"items": {
"type": "object",
"properties": {
"id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false,
"x-primary-key": true
},
"source_id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false
},
"title": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"description": {
"type": "string",
"x-dbtype": "text",
"x-nullable": false,
"maxLength": 65535
},
"link": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"pub_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": true,
"default": "NULL"
},
"added_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": false,
"default": "current_timestamp()"
},
"updated_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": false
},
"status": {
"type": "integer",
"x-dbtype": "tinyint",
"x-nullable": false
}
}
}
}
}
}
}
}
},
"post": {
"tags": [
"rss_feeds"
],
"summary": "Create",
"parameters": [
{
"name": "item",
"in": "body",
"description": "Item to create.",
"required": true,
"schema": {
"type": "object",
"required": [
"id",
"source_id",
"title",
"description",
"link",
"updated_date",
"status"
],
"properties": {
"id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false,
"x-primary-key": true
},
"source_id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false
},
"title": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"description": {
"type": "string",
"x-dbtype": "text",
"x-nullable": false,
"maxLength": 65535
},
"link": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"pub_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": true,
"default": "NULL"
},
"added_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": false,
"default": "current_timestamp()"
},
"updated_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": false
},
"status": {
"type": "integer",
"x-dbtype": "tinyint",
"x-nullable": false
}
}
}
}
],
"responses": {
"200": {
"description": "Identifier of created item.",
"schema": {
"type": "integer"
}
}
}
}
},
"/rss_feeds/{id}": {
"get": {
"tags": [
"rss_feeds"
],
"summary": "Read",
"parameters": [
{
"name": "id",
"in": "path",
"description": "Identifier for item.",
"required": true,
"type": "string"
}
],
"responses": {
"200": {
"description": "The requested item.",
"schema": {
"type": "object",
"properties": {
"id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false,
"x-primary-key": true
},
"source_id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false
},
"title": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"description": {
"type": "string",
"x-dbtype": "text",
"x-nullable": false,
"maxLength": 65535
},
"link": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"pub_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": true,
"default": "NULL"
},
"added_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": false,
"default": "current_timestamp()"
},
"updated_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": false
},
"status": {
"type": "integer",
"x-dbtype": "tinyint",
"x-nullable": false
}
}
}
}
}
},
"put": {
"tags": [
"rss_feeds"
],
"summary": "Update",
"parameters": [
{
"name": "id",
"in": "path",
"description": "Identifier for item.",
"required": true,
"type": "string"
},
{
"name": "item",
"in": "body",
"description": "Properties of item to update.",
"required": true,
"schema": {
"type": "object",
"required": [
"id",
"source_id",
"title",
"description",
"link",
"updated_date",
"status"
],
"properties": {
"id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false,
"x-primary-key": true
},
"source_id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false
},
"title": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"description": {
"type": "string",
"x-dbtype": "text",
"x-nullable": false,
"maxLength": 65535
},
"link": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"pub_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": true,
"default": "NULL"
},
"added_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": false,
"default": "current_timestamp()"
},
"updated_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": false
},
"status": {
"type": "integer",
"x-dbtype": "tinyint",
"x-nullable": false
}
}
}
}
],
"responses": {
"200": {
"description": "Number of affected rows.",
"schema": {
"type": "integer"
}
}
}
},
"delete": {
"tags": [
"rss_feeds"
],
"summary": "Delete",
"parameters": [
{
"name": "id",
"in": "path",
"description": "Identifier for item.",
"required": true,
"type": "string"
}
],
"responses": {
"200": {
"description": "Number of affected rows.",
"schema": {
"type": "integer"
}
}
}
},
"patch": {
"tags": [
"rss_feeds"
],
"summary": "Increment",
"parameters": [
{
"name": "id",
"in": "path",
"description": "Identifier for item.",
"required": true,
"type": "string"
},
{
"name": "item",
"in": "body",
"description": "Properties of item to update.",
"required": true,
"schema": {
"type": "object",
"required": [
"id",
"source_id",
"title",
"description",
"link",
"updated_date",
"status"
],
"properties": {
"id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false,
"x-primary-key": true
},
"source_id": {
"type": "integer",
"x-dbtype": "int",
"x-nullable": false
},
"title": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"description": {
"type": "string",
"x-dbtype": "text",
"x-nullable": false,
"maxLength": 65535
},
"link": {
"type": "string",
"x-dbtype": "varchar",
"x-nullable": false,
"maxLength": 255
},
"pub_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": true,
"default": "NULL"
},
"added_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": false,
"default": "current_timestamp()"
},
"updated_date": {
"type": "string",
"x-dbtype": "datetime",
"x-nullable": false
},
"status": {
"type": "integer",
"x-dbtype": "tinyint",
"x-nullable": false
}
}
}
}
],
"responses": {
"200": {
"description": "Number of affected rows.",
"schema": {
"type": "integer"
}
}
}
}
}
}
}