<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProducteursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('producteurs')->delete();
        
        \DB::table('producteurs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Alsace grand cru',
                'region' => 'Alsace',
                'information' => 'Le vin Alsace Grand Cru est produit uniquement en vin blanc avec les quatre cépages nobles : riesling, gewurztraminer, pinot gris, muscat. Ils peuvent être cultivés et vinifiés en blancs secs, vendanges tardives et sélection de grains nobles. Il existe 50 Grands Crus en Alsace. Nous allons aborder la dégustation générale des différents grands crus en fonction de leurs cépages. ',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'Crémant Alsace',
                'region' => 'Alsace',
            'information' => 'Voici une belle appellation d’Alsace, méconnue mais très complète car elle offre la possibilité aux vignerons d’élaborer des crémants avec la quasi-totalité des cépages alsaciens : pinot blanc, pinot gris, pinot noir, chardonnay (exception) et riesling. Seul le crémant d’Alsace générique peut être produit en rosé. Ces vins effervescents sont élaborés selon la méthode traditionnelle. ',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'Blaye',
                'region' => 'Bordeaux',
                'information' => 'Le vin de Blaye, ne peut être produit qu’en rouge. Le vignoble est situé sur la rive droite de la Gironde au nord de Bordeaux. Ces vins ne sont pas éclipsés par les grands seigneurs du vignoble girondin au contraire ils sont même plutôt connus et reconnus.',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'Saint-Emilion',
                'region' => 'Bordeaux',
            'information' => 'Saint Emilion fait partie des appellations mythiques du vignoble de Bordeaux. Il fait partie des vins dits de la « rive droite », c\'est-à-dire de la rive droite de la Dordogne, à l’est de Libourne. En plus de fournir des grands vins, la ville de Saint-Emilion est de toute beauté, elle reflète parfaitement bien la richesse historique de cette région, elle a été classée au patrimoine mondial de l’UNESCO. Avant de rentrer plus en avant dans notre sujet, il est important de préciser qu’il faut bien distinguer : les satellites de Saint Emilion (St Georges, Puisseguin...) de l’AOC Saint Emilion, de même qu’il faut distinguer cette dernière des AOC Saint-Emilion grand cru, grand cru classé et premier grand cru classé qui sont traitées dans les pages qui leur sont dédiées. Pour faire court, elles correspondent à des critères qualitatifs et de distinctions. Les vignes de merlot, qui représentent 60% de l’encépagement, et les vignes de cabernet franc et cabernet sauvignon, croissent sur des sols calcaires, argilo-calcaires et graveleux. Les châteaux qui se partagent cette appellation sont nombreux. ',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            4 => 
            array (
                'id' => 5,
                'nom' => 'Périgord',
                'region' => 'Bordeaux',
                'information' => 'Le vignoble des vins de pays du Périgord est réparti à la fois sur les départements du Lot et de la Dordogne dans la région viticole du Sud Ouest. Les vins rouges, blancs et rosés qu’il fournit, sont surtout présents dans les commerces locaux. Une dénomination géographique a été rattachée à cette IGP, c’est le vin de Domme ! Ce vin, jusqu’à la crise du phylloxéra, jouissait d’une bonne réputation. Il faudra attendre les années 90 pour que quelques viticulteurs replantent ce vignoble oublié. Sa législation par contre est plus rigoureuse que pour les autres IGP. ',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            5 => 
            array (
                'id' => 6,
                'nom' => 'Chénas',
                'region' => 'Beaujolais',
                'information' => 'Ce cru du Beaujolais comme tous les autres à son caractère bien à lui, mais c’est le vin le plus recherché de cette région. Le gamay est un cépage qui s’épanouit très bien sur les terroirs de ce vignoble. Littéralement chénas veut dire « lieu planté de chênes ».',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            6 => 
            array (
                'id' => 7,
                'nom' => 'Moulin-à-vent',
                'region' => 'Beaujolais',
                'information' => 'Voici un très beau cru du vignoble du Beaujolais. Les vignes de Moulin à vent sont plantées sur les coteaux les plus qualitatifs de Romanèche-Thorins et Chènas. Son nom viendrait d’un Moulin situé à cet endroit. Les sols sont essentiellement composés de granites appelés « gores », ceux-ci confèrent à ce cru une puissance et une race bien particulière. Neuf climats ont été identifiés, les plus connus sont : Les Carquelins, La Roche, La Pierre, Rochegrès, Les Rouchaux... Certains propriétaires, comme le domaine Jadot, au château des Jacques, fournissent des vins de Moulin à Vent qui collent de très prés aux grands vins de la Côte d’Or. ',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            7 => 
            array (
                'id' => 8,
                'nom' => 'Echezeaux',
                'region' => 'Bourgogne',
            'information' => 'Ce vin rouge de Bourgogne de la côte de Nuits figure parmi les vins les plus connus du monde. Véritable vin de légende depuis très longtemps l’Echézeaux est un vin d’une grande élégance, d’une qualité exceptionnelle. Les vignes de ce grand cru s’étendent sur plus de 36 hectares sur les deux communes de Flagey-Echézeaux et Vosne Romanée, il fait pourtant partie des grands crus de Vosne Romanéé (romanée conti, romanée...). Il ne faut pas le confondre avec le Grands-Echézeaux ce sont deux grands crus bien différents. Son nom viendrait de « chezeaux » qui signifie hameau. Nous devons aux moines de Citeaux la création de ce cru mythique. Sur l’aire d’appellation Echezeaux des « climats » ont été répertoriés, les plus connus sont : Les Beaumonts-Hauts, Les Rouges-Du-Bas, Les Echezeaux-Du-Dessus, Cruots et Vignes Blanche. ',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            8 => 
            array (
                'id' => 9,
                'nom' => 'Santenay',
                'region' => 'Bourgogne',
                'information' => 'Comme pratiquement partout en Bourgogne, la vigne est présente depuis le 2 ème siècle après JC. Après la chute de l’empire Romain, ce sont les abbayes qui prendront soin des vignobles, dont Cluny et Cîteaux. Le vignoble de Santenay n’échappe donc pas à la règle. Ce vignoble se situe au sud de la côte de Beaune, vignoble marqué par la présence des ducs de Bourgogne. Les vignes de Santenay croissent sur des coteaux pouvant atteindre 500 mètres d’altitude, composés de sols argilo-calcaires, de marnes et calcaires divers. On compte 12 climats classés en « premier cru », pouvant être produits tant en blancs qu’en rouges, les plus connus sont : Clos Rousseau, Clos des Mouches, Beauregard, Beaurepaire...',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            9 => 
            array (
                'id' => 10,
                'nom' => 'Le Côteaux Champenois',
                'region' => 'Champagne',
                'information' => 'Le Coteaux champenois est une appellation viticole dont les vins sont produits dans le vignoble de la Champagne, vignoble au nord-est de la France et plus précisément dans les régions viticoles de la Montagne de reims, de la Vallée de la marne, de la Côte des blancs, de la Côte des bar, de la Côte de sézanne et de Vitry-le-françois. Son vignoble bénéficie d\'un climat tempéré-océanique à influence continentale et d\'un terroir fait de sols calcaires et marneux. ',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            10 => 
            array (
                'id' => 11,
                'nom' => 'Côteaux de Coiffy',
                'region' => 'Champagne',
                'information' => 'Cette IGP de la Haute Marne qu’on peut placer dans le vignoble de Champagne, s’est fait reconnaître de nombreuses fois par les guides des vins, pour la qualité de ses vins blancs, rouges et rosés. ',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            11 => 
            array (
                'id' => 12,
                'nom' => 'Haute-Marne',
                'region' => 'Champagne',
                'information' => 'Traditionnellement on associe le vignoble de l’IGP Haute Marne à celui de la Champagne et plus précisément à la région viticole de la vallée de la Marne. Cependant les vins produits sur ce département ne peuvent que dans certaines conditions vendre leurs vins sous l’appellation Champagne. Cela dit, l’IGP Haute-Marne regroupe en son sein plusieurs types de vins différents : des vins nouveaux ou primeurs, des vins moelleux et de vins mousseux. Les cépages utilisés sont essentiellement ceux de la Champagne. ',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            12 => 
            array (
                'id' => 13,
                'nom' => 'Bandol',
                'region' => 'Corse',
                'information' => 'Le vin de Bandol est un vin qui peut être produit en blanc, rouge et rosé. Il fait partie des grands vins de Corse.',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            13 => 
            array (
                'id' => 14,
                'nom' => 'Île de Beauté',
                'region' => 'Corse',
                'information' => ' L\'Ile de Beauté est une appellation viticole dont les vins sont produits dans le vignoble de Provence-corse, vignoble au sud-est de la France et plus précisément dans la région viticole de Corse. Son terroir bénéficie d\'un climat méditerranéen avec des influences montagnardes et de sols granitiques, calcaires, grès, sables, silico-argileux et argileux. ',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            14 => 
            array (
                'id' => 15,
                'nom' => 'Méditeranée',
                'region' => 'Corse',
                'information' => 'L’aire de cette IGP est très étendue puisqu’elle regroupe des zones en Provence, en Corse, dans le Rhône septentrional et méridional. De nombreux vins de cépages sont représentés comme le cabernet, le merlot, le chardonnay, la syrah...Mais sont présents aussi les cépages locaux des différentes zones cités ci-dessus. L’éventail des vins est donc immense, d’autant plus qu’ils peuvent tous être commercialisés en primeur et en mousseux ! Voici des dégustations, elles ont pour but d’offrir les caractéristiques générales des vins mais ne sont en aucun cas des jugements de valeur, c’est pour cela que les domaines dégustés ne sont pas cités.',
                'created_at' => '2022-06-11 13:06:31',
                'updated_at' => '2022-06-11 13:06:31',
            ),
            15 => 
            array (
                'id' => 16,
                'nom' => 'Corbières',
                'region' => 'Languedoc',
                'information' => 'Le vignoble des Corbières est historique, il remonte aux romains, voire au phocéens lorsqu’ils colonisèrent le sud est de la Gaulle. Les vins rouges, blancs et rosés ont des caractères bien affirmés et divers, en fonction des terroirs qui ont été identifiés et délimités; il y en a 11: Boutenac, Durban, Fontfroide, Lagrasse, Lézignan, Montagne d’Alaric, Quéribus, Saint-Victor, Serviès, Sigean, Termenès. Nous n’allons pas aborder la dégustation de tous ces terroirs évidemment, cela serait trop long et vous donnerait le tournis.',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            16 => 
            array (
                'id' => 17,
                'nom' => 'Arièges',
                'region' => 'Languedoc',
                'information' => 'Le vin de pays de l’Ariège peut être produit en blanc, rouge et rosé et blanc moelleux. On peut le trouver aussi suivi des dénominations, Coteaux de la Lèze et Coteaux du Plantaurel. ',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            17 => 
            array (
                'id' => 18,
                'nom' => 'Moselle',
                'region' => 'Lorraine',
                'information' => 'Il aura fallu du temps pour que cette AOVDQS soit reconnue en tant qu’AOC. En effet, Moselle devrait accéder au titre d’appellation d’origine contrôlée vers la fin de l’année 2011. Elle le mérite bien car le vignoble de Lorraine dans son ensemble a beaucoup souffert des guerres de la fin du 19ème et du 20 ème siècle. Malheureusement les vignerons sont de moins en moins présents dans cette région viticole, ils ne se comptent plus que sur les dix doigts de la main. Les trois couleurs rouge, rosé et blanc peuvent être produites, la seule particularité c’est que le rosé peut être appelé « vin gris » à cause de sa robe rose très pâle « pelure d’oignon ». ',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            18 => 
            array (
                'id' => 19,
                'nom' => 'Muscadet',
                'region' => 'Loire',
            'information' => 'Voici l’exemple parfait d’une appellation qui s’est fait connaître grâce au met qui l’accompagne idéalement : les huîtres. De fait, le vignoble du muscadet situé en Loire-Atlantique dans le Maine-et-Loire et la Vendée jouit de l’influence immédiate de l’Océan. Les vignes croissent non loin de la ville de Nantes et sont présentes depuis fort longtemps et certainement bien avant que Rabelais (16ème) en fasse l’éloge. On doit certainement aux abbayes de la région l’expansion de la vigne. Ici, le cépage roi est le Melon de bourgogne qui se plaît à merveille sur un sol de roches éruptives et métamorphiques du massif armoricain (gneiss, schistes, amphibolite, granite...). Au sein de cette appellation, il existe deux dénominations bien distinctes : le muscadet sur lie et le muscadet primeur. Il existe d’autres appellations sur ce vignoble comme les muscadets coteaux de grandlieu et les coteaux de la Loire, mais nous ne les aborderons pas ici car ce sont deux appellations à part entière, pour en savoir plus n’hésitez pas à vous rendre sur les pages qui leurs sont consacrées. ',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            19 => 
            array (
                'id' => 20,
                'nom' => 'Puy-de-Dôme',
                'region' => 'Loire',
                'information' => 'Voici une IGP peu connue mais qui se partage la vedette avec l’autre IGP Côtes d’Auvergne. Sa consommation est surtout locale. Les cépages gamay, pinot noir et sauvignon sont utilisés principalement pour les trois couleurs rouge, blanc et rosé. Le vignoble est situé au cœur des volcans d’Auvergne, près du Puy de Saint-Sandoux entre la plaine de la Limagne et le Parc Naturel des Volcans. On rencontre plusieurs types de sols dans cette zone, des sols basaltiques, argilo-calcaire et de grès roses. ',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            20 => 
            array (
                'id' => 21,
                'nom' => 'Côtes de Provence',
                'region' => 'Provence',
                'information' => 'Cette appellation prestigieuse du vignoble de Provence regroupe en son sein des dénominations géographiques précises qui correspondent à des terroirs et donc à des vins différents. L’appellation côtes de Provence peut donc être produite en blanc, rouge et rosé, mais elle peut être suivie des dénominations Sainte Victoire, La Londe et Fréjus, ces dernières réservées uniquement pour les vins rouges et rosés. Les vignes sont plantées entre Nice et Marseille. La production de rosé domine dans cette appellation. ',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            21 => 
            array (
                'id' => 22,
                'nom' => 'Alpes-Maritimes',
                'region' => 'Provence',
                'information' => 'Le vin des Alpes-Maritimes existe en blanc, rouge et rosé. ',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            22 => 
            array (
                'id' => 23,
                'nom' => 'Var',
                'region' => 'Provence',
                'information' => 'Situé en plein cœur des Coteaux Varois, le vignoble de cette IGP qui peut être produite sur l’ensemble du département du Var, donne des vins très intéressants, excellents. Les vignes sont plantées sur des coteaux exposés plein sud à plus de 300 mètres d’altitude, elles baignent dans un paysage typique de Provence. Les sols sont essentiellement argilo-calcaires. Les vignerons n’hésitent pas à utiliser des cépages exogènes comme le chardonnay, le cabernet sauvignon et le merlot. ',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            23 => 
            array (
                'id' => 24,
                'nom' => 'Luberon',
                'region' => 'Rhône',
                'information' => 'Le paysage viticole de cette appellation est merveilleux. En effet, dans cette région les vignes sont plantées en plein cœur du Parc naturel Régional du Lubéron. L’aire d’appellation au nord est limitée par la vallée du Cavalon, et au sud par la vallée de la Durance. Les vignes sont probablement présentes depuis les romains, comme un peu partout dans le Rhône méridional. Les trois couleurs sont bien représentées, cependant les vins blancs dominent la production, car bien que le climat soit essentiellement méditerranéen, le vignoble du Lubéron subit les influences des Alpes qui rafraîchissent l’air. Rappelons qu’autrefois l’AOC portait le nom de Côtes du Lubéron. ',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            24 => 
            array (
                'id' => 25,
                'nom' => 'Vaucluse',
                'region' => 'Rhône',
                'information' => 'C’est une IGP peu connue, elle est produite dans le Rhône méridional près des grands appellations Châteauneuf du Pape, Vacqueyras...Le paysage est superbe, avec le parc naturel du Lubéron, les Monts de Vaucluse, le Mont Ventoux qui domine, bref, c’est très beau. Les sols divers, galets roulés, calcaires, granitiques...Les cépages rouges alternent entre grenache, syrah et merlot, sauvignon, viognier et chardonnay...',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
        ));
        
        
    }
}