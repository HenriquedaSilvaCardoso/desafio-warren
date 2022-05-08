<?
class FirstExercise {

    # função utilizada para reverter o número inserido nela
    public function reverseNumber($num)
    {
        $revnum = 0; # váriavel para guardar o número 
        if($num % 10 == 0) # se o resto da divisão por 10 do número for 0 pare a função
            return false;
        while ($num >= 1) {  # enquanto num for maior que 1 faça
            $rem = $num % 10;  # variável recebe o último digito do número
            $revnum = ($revnum * 10) + $rem;  # rem é posta no final de revnum 
            $num = ($num / 10);  # num é dividido por 10
        }
        if($revnum)  # se revnum tiver algum valor dentro dele, retorne
            return $revnum;
        else
            return false;
    }

    # função utilizada para checar se todos os dígitos são ímpares
    public function allOdd($num) { 
        $num = str_split($num);  # divide o número em seus dígitos 
        foreach($num as $digit) {  # passa pelo array com os dígitos
            if($digit % 2 == 0) {  # confere se o dígito é par
                return false;
            }
        }
        return true;
    }

    public function generateNumbers($maxNum)
    {
        $numbers = array();  # declara o array que conterá os números 
        $cont = 0;  # conta a quantidade de números reversíveis 
        for ($i = 1; $i < $maxNum; $i++) {  # passa por todos os números de 1 até o número máximo informado

            # ao testar algumas vezes o programa percebi que de 10000 (dez mil) até 100000 (cem mil) não há números reversiveis então esses  números são pulados buscando otimização de código
            switch($i) {
            case '10000':
                $i = 100000;
                break;
            };

            # aqui o número revertido é somado com o número normal e é conferido se os dígitos dessa soma são todos ímpares, se sim adicionam o número ao array e incrementam a contagem em 1
            $rev = $this->reverseNumber($i);
            $sum = $i + $rev; 
            if($this->allOdd($sum)) {
                $numbers[] = $i;
                $cont++;
            }
        }
        # retorna um array com o array dos números e a contagem completa
        return array(
            'numeros' => $numbers,
            'quantidade' => $cont
        );
        
    }
}
