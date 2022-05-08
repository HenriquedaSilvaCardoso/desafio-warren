# Desafio de Programação da War
 
Como executar a aplicação:

1. Você precisará instalar um servidor Apache na sua máquina, eu utilizei o XAMPP;
2. Dentro do XAMPP, você precisará habilitar "short open tags";
3. Para isso abra o XAMPP e vá até config do apache;
![image](https://user-images.githubusercontent.com/85131296/167318794-93f0772a-0ac9-41f1-be69-fb45c8211268.png)
4. Clique na opção PHP (php.ini);
5. Pressione as teclas Ctrl + F e digite: "short_open_tag=" (sem aspas), você encontrará short_open_tag=Off;
6. Mude esse Off para On e se um ponto e vírgula estiver no começo da linha remova-o;
7. Salve o Arquivo e agora volte para o config do apache e clique na opção Apache (httpd.conf);
8. Pressione as teclas Ctrl + F e digite: "DocumentRoot" (sem aspas) e logo abaixo do primeiro resultado você encontrará isso (outra rota após DocumentRoot e Directory):

![image](https://user-images.githubusercontent.com/85131296/167319309-ca56ae18-b5cf-4dd8-8dc8-7bbe64e98347.png)

9. Substitua a rota por onde foi clonado este repositório, exemplo na imagem acima;
10. Digite localhost no seu navegador;
11. E selecione o diretório equivalente ao repositório clonado, exemplo abaixo: 

![image](https://user-images.githubusercontent.com/85131296/167319500-617b4106-71bd-4424-9230-f8f608654106.png)

As tecnologias utilizadas foram Visual Studio Code, PHP, HTML, CSS e Javascript.


