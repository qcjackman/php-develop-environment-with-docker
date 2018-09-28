# php-develop-environment-with-docker

一个用于php开发的docker环境编排，包含`nginx`，`php-fpm`，`mysql`，`redis`。`php-fpm` 镜像里安装了 `supervisor`，如果还需要安装其他的软件或者扩展可以编辑 `Dockerfile.php`

## 目录结构

```tree
├─conf            #各个容器需要的配置文件
│  ├─mysql        #mysql配置文件
│  ├─nginx
│  │  └─conf.d    #nginx配置文件
│  ├─redis        #redis配置文件
│  └─supervisor
│      └─conf.d   #supervisor配置文件
├─data            #mysql数据目录
└─www             #代码存放目录
```

## 配置

每个容器需要映射的配置文件都在 `conf` 目录下对应的目录中，可在启动容器前按需要进行修改，各容器端口映射在 `docker-composer.yaml` 中修改

## 使用

```shell
docker-compose rm -sf
docker-compose up -d
```

## 使用composer创建laravel项目

```shell
docker run -it --rm --volume YOUR_PATH/php-develop-environment-with-docker:/app composer create-project --prefer-dist laravel/laravel www
```

    注意：上述命令会使用composer官方镜像，如果本地没有会自动下载

## 参考

```url
https://github.com/rootrl/php-environment-with-docker.git
```