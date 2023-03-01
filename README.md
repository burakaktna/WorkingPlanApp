# WorkingPlanApp
## _Geliştiricilerinizin çalışma kapasitesi ve çalışma süresine göre iş planını hesaplayın_

İşlerin iletildiği providerlarınızı sisteme entegre edin.
###### Default Providers
- Provider1 (TR)
- Provider2 (USA)
- ✨Magic ✨, İstediğiniz kadar ekleyebilirsiniz. Kod değiştirmeniz gerekmez.

## Features

- Haftalık olarak tüm providerları gezer ve iş listesini (tasks) oluşturur.
- Calculator Service devreye girer, çıkarılan işleri tasklara böler.
- Tasklar developer bazlı paylaştırılır.
- Her developer yalnızca yapabildiği işleri alır.
- Ve hangi developer'ın hangi işi ne kadar sürede yapacağı hesaplanır
- Toplam iş planı hesaplanır, tüm hesaplar arayüzde gösterilir.
## Docker
Bu proje, Docker ile kolayca kurulup çalıştırılabilir. Docker, projenizin gereksinimlerini karşılayacak bir ortam oluşturur ve bu ortamda projenizi çalıştırmanızı sağlar.

Docker kurulumu ve kullanımı hakkında detaylı bilgiye Docker belgelerinden ulaşabilirsiniz.

Docker kullanarak bu projeyi kurmak için aşağıdaki adımları izleyin:

### Öncekikle sail alias ayarınızı yapın.
```sh
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail' 
```

- Docker'ı kurun ve sisteminize yükleyin.
- Projenizin kaynak kodunu bilgisayarınıza indirin ve bir klasöre çıkartın.
- Proje klasörünü açın ve aşağıdaki komutu çalıştırın:
```sh
sail up -d
```
Bu komut, projeniz için gereken tüm container'ları oluşturur ve çalıştırır.
Container'lar çalışmaya başladıktan sonra, aşağıdaki adrese giderek projenizi kullanabilirsiniz:
```sh
127.0.0.1:8000
```

Bu proje, Docker ile rahatlıkla kurulup çalıştırılabilir. İsterseniz Docker kullanarak projenizi geliştirmeye ve test etmeye de devam edebilirsiniz. Docker'ın kolay kurulumu ve kullanımı sayesinde projenizi hızlı bir şekilde ayarlamanıza ve çalıştırmanıza yardımcı olur.


## License

MIT

**Free Software, Hell Yeah!**
