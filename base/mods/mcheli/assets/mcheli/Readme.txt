
2014/06/29

;***********************************************************************************
;■武器設定ファイル weapons/***.txt, sound/***_snd.ogg
;***********************************************************************************

;武器を増やすには以下の2ファイルが必要 (全て小文字であること)
; ・weaponsフォルダに武器設定ファイル(txt)を増やす
; ・soundフォルダに武器設定ファイルと同じ名前+_sndの使用音(ogg)を増やす
; 例えば abc という武器であれば weapons/abc.txt と sound/abc_snd.ogg が必要

;数値パラメータには上下限が存在するものがある。

DisplayName = M134 Minigun
;表示される名前 ※全角を使用しないこと、半角英数字と記号のみ

Type = MachineGun1
;武器タイプ 以下から1つ設定できる
;	MachineGun1	向き固定のマシンガン ... M134など
;	MachineGun2	プレイヤーの視点に向きを合わせるマシンガン ... M230
;	Torpedo		水中に落とすと水中で目標に向かう魚雷 ... Mk46
;	CAS			目標地点に近接航空支援を行う ... A-10
;	Rocket		向き固定の無誘導ロケット ... Hydra70 や SNEB68mm
;	ASMissile	地上の目標地点に飛んで行くミサイル ... AGM119
;	AAMissile	空中にいるモブを追跡するミサイル ... AIM92
;	TVMissile	発射後プレイヤーが向きを操作できるMissile ... AGM114[TV]
;	ATMissile	地上にいるモブを追跡するミサイル ... AGM114
;	Bomb		真下に投下する爆弾 ... CBU-100
;	MkRocket	着弾地点に砲撃させるロケット ... Hydra 70mm M264RP

Power = 8
;ダメージ

Acceleration = 4.0
;弾の速度 (一部を除き最大4.0)
; MachineGun1, MachineGun2, Rocket のみ最大100.0まで可能

AccelerationInWater = 4.0
;魚雷の水中での速度 (最大4.0)

VelocityInWater = 0.5
;水中での加速度
; 水中ではTick毎にこの値が速度に乗算される。

Explosion = 0
;着弾時の爆発の威力(0=爆発なし、1=ガストの弾の威力、2～)
ExplosionInWater = 0
;水中での着弾時の爆発の威力
ExplosionAltitude = 10
;爆発する地上からの高さ
;10にすると地上から10m以内に入ると爆発する

DelayFuse = 30
;遅延信管：着弾から弾が消滅するまでのカウント
; Explosion/ExplosionInWater が0でない場合は、消滅時に爆発する

Bound = 0.4
;着弾時の跳ね返りの強さ
; Boundを使用する場合、DelayFuse も設定しないと着弾直後に爆発するため意味が無い

TimeFuse = 30
;時限信管：発射から弾が消滅するまでのカウント
; Explosion/ExplosionInWater が0でない場合は、消滅時に爆発する

Flaming = false
;着弾時に炎を撒くかどうか(false=無効、true=有効)
; ※ Explosion > 0 の時のみ有効

Sight = MoveSight or None or MissileSight
;画面に表示される照準
;	MoveSight		機体の向きにあわせて移動する照準
;	MissileSight	モブをロックするタイプの照準(AAMissile/ATMissileでは必須)

Delay = 5
;次の使用までの待ち時間(約1/20秒単位)、小さいほど早い

ReloadTime = 80
;リロード完了までの待ち時間(1/20秒単位)、小さいほど早い
; ※リロード時間を0にする際は装弾数を0以外に設定すること

Round = 100
;装弾数 使用しない時は 0 を設定するか、このパラメータ自体を記載しない

SoundVolume = 3
;武器使用時の音量
; マイクラの仕様で 1.0 以上に設定すると最大音量となる
; (音量を下げる場合は 1,0 未満にする)
; 1.0 を超えると遠くからでも音声が聞こえる

SoundPitch = 1.0
;音の高さ (0.0 ~ 1.0)

SoundDelay = 1
;音声を連発した際に、次の音を鳴らすまでの待ち時間
;M134などはこの設定がないと音声を連発し過ぎで他の音が消える

LockTime = 20
;ロックオンするタイプのミサイルのロックまでの時間。大きいほどロックまで時間がかかる。

ProximityFuseDist = 1.0
;ロックオンするタイプのミサイルの近接信管の動作距離
; 1 を指定すると 1m 以内に入ったら爆発

Accuracy = 1
; 無誘導の銃弾やロケットの誤差。大きいほど誤差が大きい。

Bomblet = 25
;使用後、子弾が展開する数。クラスター爆弾などに使用。
BombletSTime = 5
;子弾が展開するまでの時間
BombletDiff = 0.7
;子弾の拡散率

ModeNum = 2
; Xキーで切り替えられる武器のモード数
; 以下の武器タイプでのみ設定可能
; Type = MachineGun2 → HE弾に切り替え(爆発する弾)。Explosion が0の場合無効。
; Type = TVMissile   → 通常誘導弾に切り替え(ミサイル視点でない誘導弾)
; Type = ATMissile   → TAモード(TopAttack)に切り替え(敵の前で上に上がったあとに急降下する)
; Type = Rocket      → HEIAP弾に切り替え(空中で複数の子弾を撒く)
; 現在 1か2のみ設定可能。
; 省略時は1

Piercing = 2
; ブロックの貫通回数

HeatCount = 20
;銃身熱量式の武器の、1回の使用で上がる熱量
MaxHeatCount = 150
;熱量上限

FAE = true
;燃料気化爆弾のON/OFF
;true で燃料気化爆弾になる
;燃料気化爆弾はブロックを破壊しない

ModelBullet = bullet
ModelBomblet = cbc
;弾丸のモデルファイル指定
; 上記の場合 models/bullets/bullet.obj と textures/bullets/bullet.png が使用される。
; クラスター爆弾の子弾には models/bullets/cbc.obj と textures/bullets/cbc.png が使用される。

Destruct = true
;使用すると機体が自爆する
; Type = Bomb の場合のみ使用可能。
; 機体が UAVのヘリコプター の場合のみ効果がある。

Gravity = -0.04
GravityInWater = 0.0
;弾頭の落下速度
; 絶対値が大きいほど早く下に落ちる
; GravityInWater は水中での落下速度

GuidedTorpedo = true
;魚雷の誘導/無誘導を切り替える設定
; true  にすると誘導魚雷になり、指定したブロックに向かう
; false にすると無誘導魚雷になり、落下した位置からまっすぐに進む

Particle = none
; 特定武器の使用時のエフェクトを指定する
; none          ...エフェクト無し
; explode       ...煙のエフェクト
; flame         ...炎のエフェクト
; hugeexplosion ...煙のエフェクト
; largeexplode  ...煙のエフェクト
; largesmoke    ...煙のエフェクト
; smoke         ...煙のエフェクト
;
; 詳しい方向けへの説明: spawnParticle に設定する文字列なので、他の文字列も指定可能。

DisableSmoke = true
; 特定の武器の煙のエフェクトを無効化する
; (射撃時のエフェクトではなく、移動時に出る煙のエフェクト)

SetCartridge = cartridge, 0.0, 0, 0, 2.00, -0.04, 0.40
; 武器使用時に空薬莢を落とす設定
; SetCartridge = model_name, Acceleration, Yaw, Pitch, ModelScale, Gravity, Bound
; model_name   : モデル名 全て小文字、半角
; Acceleration : 飛ばす強さ 0だと真下に落ちる
; Yaw          : 武器からみて横方向に飛んで行く角度(Yaw)   正の値:左、負の値:右
; Pitch        : 武器からみて縦方向に飛んで行く角度(Pitch) 正の値:下、負の値:上
; ModelScale   : 表示倍率
; Gravity      : 重力の強さ
; Bound        : ブロックにぶつかった時の跳ね返りの強さ


MaxAmmo = 40
; 機体が保持できる最大弾数
SuppliedNum = 10
; 1回の弾薬補給で追加される弾数
Item =  3, iron_ingot
Item =  4, gunpowder
Item =  2, redstone
; 補給に必要なアイテムとスタック数 (鉄インゴット、火薬、レッドストーンのみ指定可能)

; MaxAmmo = 40
; SuppliedNum = 10
; Item =  3, iron_ingot
; Item =  4, gunpowder
; Item =  2, redstone
; この例では、1回のリロードで 鉄インゴット3個、火薬4個、レッドストーン2つ消費して
; 10発補給できる。40発まで補給できるので最大まで補給すると
; 鉄インゴット12個、火薬16個、レッドストーン8つ を消費する


BulletColor        = 255, 255, 255, 255
BulletColorInWater = 255,  25,  25,  75
; 弾の色設定(0～255)。前から順に Alpha, Red, Green, blue
; BulletColorInWater は水中での色を指定する。


;***********************************************************************************
;■ヘリコプター/戦闘機/地上兵器の設定ファイル 共通設定
;***********************************************************************************

DisplayName =  AH-6 Killer Egg
;表示される名前 ※全角を使用しないこと、半角英数字と記号のみ

AddDisplayName = ja_JP, AH-6 キラ－エッグ
;アイテムを持った際に表示される名前
; ※日本語全角を使用する際はファイルの文字コードをUTF-8にすること

ItemID = 28801
;アイテムID (Minecraft内では +256 されて使用される)
; ※ ItemIDは 1.7.2以降使用しないが、1.6.4以前にも対応する場合には設定が必要

AddTexture = sh60-us-1
AddTexture = sh60-jp-1
AddTexture = sh60-jp-2
;追加テクスチャ (複数可)
; デフォルトでは設定ファイル名と同じ名前のpngが使われるが、
; それ以外の追加のテクスチャを追加する(拡張子は不要)。

CameraPosition = 0.0, 1.1, 3.7, false
;カメラの座標
;4番めの設定をtrueにすると常にカメラからの視点になる

CameraZoom = 3
; カメラのズームの最大

EnableGunnerMode = true
;ガンナーモード切り替えの有無(true=有り、false無し)

EnableNightVision = true
;ナイトビジョン切り替えの有無(true=有り、false無し)

EnableEntityRadar = false
;レーダーの有無(true=有り、false無し)

Speed = 0.6
;機体の速度 大きいほど早い

MobilityYaw
;機体の横方向の回転量、大きいほど機動性が良い
MobilityPitch
;機体の縦方向の回転量、大きいほど機動性が良い、地上兵器は仰角の上下限設定になる
MinRotationPitch
MaxRotationPitch
;機体の縦方向の回転限界(最小・最大)

AddSeat =-0.45,  0.80,  1.20
AddSeat = 0.45, -0.50,  1.20
AddSeat =-0.90, -0.50,  0.20
AddSeat = 0.90, -0.50,  0.20
;座席を追加する ※UAVを除き座席は必ず1つ以上なければならない
; 1つ目がパイロットの座席
; パラメータは位置(X,Y,Z)

AddGunnerSeat = -0.45,  0.80,  1.20, 0.0,2.00,-1.01
; 座席を追加する
; ２番席以降にのみ設定可能
; AddGunnerSeat で追加した座席のプレイヤーは視点がカメラからの視点になる
; パラメータは位置(X,Y,Z)と、カメラの位置
; カメラの位置は省略可能で、省略時は CameraPosition の位置になる


AddWeapon = m230,     0.00, 0.90, 2.54,   0.0, 0.0, true, 2
AddWeapon = hydra70,  0.00, 0.90, 2.54,   0.0, 0.0, true, 1, 0,-60,60, 0,25
AddWeapon = m134,     1.48, 0.40, 1.54,   1.0, 0.0
AddWeapon = m134,    -1.48, 0.40, 1.54,  -1.0, 0.0
;武器を追加する (weaponsフォルダの拡張子を除いたファイル名と一致すること)
; m134のように全く同じ武器を連続で登録した場合、
; 2箇所から順に使用する1つの武器として扱う
; パラメータは前から順に 武器設定ファイル名、位置(X,Y,Z)、回転角度(横,縦), パイロット使用可否, 座席, DefaultYaw, MinYaw, MaxYaw, MinPitch, MaxnPitch
;
; 座席は1で1番席、2で2番席、3で3番席、4以降も同様。
; 補足 「パイロット使用可否, 座席」 の組み合わせの意味について
; true,  2 → 2番席のプレイヤーが使用可能。2番席にプレイヤーがいない時はパイロットが使用可能。
; false, 2 → 2番席のプレイヤーが使用可能。パイロットは使用不可能。
; false, 1 → パイロットのみ使用可能（非推奨）
; true,  1 → パイロットのみ使用可能
; 省略すると true, 1 になる。
;
; DefaultYaw は武器のデフォルトの向きで、モデルに合わせる
; MinYaw は、機体を上から見た時に、DefaultYawから反時計回りに動かせる角度
; MaxYaw は、機体を上から見た時に、DefaultYawから時計回りに動かせる角度
; MinPitch は、上方向に動かせる角度
; MaxPitch は、下方向に動かせる角度

AddRecipe = " Y ",  "YXY",  " YD",  X, iron_block, Y, iron_ingot, D,dye,2
AddRecipe ="YXY", X, mcheli:ah-6, Y, redstone
AddShapelessRecipe = iron_block, iron_ingot, dye,2
;レシピを追加する（AddRecipeを2行以上書くとその分レシピが増える）
; ""内の3文字はワークベンチの横一列を示す。
; (Forge の GameRegistry.addRecipe と同じフォーマット)
; 上記例の詳細
; X = 鉄Block名
; Y = 鉄インゴットのItem名
; D = 緑の染料のItem名, 染料やポーションなどのダメージ指定で切り替えるものは、Item名の後にダメージ
; Item 名は下記サイトの名前をそのまま指定すれば良い。
http://minecraft.gamepedia.com/Data_values
; 例：minecraft:iron_block など。
; バニラのアイテム/ブロックの場合、minecraft: は省略して良い
; MODのアイテムを指定する場合、 mcheli:ah-6 のようにMOD名の指定が必要
; AddShapelessRecipe で指定すると不定形レシピになる

FlareType = 1
; フレアの有無
; 0=無し、1=有り、2=大型機向けのフレア

Float  = true
; 水に浮く設定

FloatOffset = -1.0
; 水に浮いた際の高さのオフセット(負の値可)

MaxHP = 100
; 耐久力

InventorySize = 18
; 機体のインベントリサイズ (9の倍数であること)

DamageFactor = 0.2
; プレイヤーがダメージを受けた際のダメージ係数
; 0.2を指定した場合、本来受けるダメージの 20% のダメージに減る
; この設定とは関係なく、プレイヤーが受けたダメージは機体も受ける


Sound = heli
; スロットルを上げた際になる音声ファイル名を指定
; この例では sounds/heli.ogg が読み込まれる

UAV = false
; 戦闘機のみに有効。trueにすると機体は無人機になり、パイロット席に乗れなくなる。
; UAVステーション以外からの生成や操作ができなくなる。

OnGroundPitch = 回転角度
; 地上にいる際の仰角を指定する。
; 例えば零戦などの機体は地上にいる際は少し上を向いている

AddPartHatch = 位置X, 位置Y, 位置Z, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180
; Zキーで開閉できるハッチを追加する。
; モデルファイル名 機体名_hatch?.obj
; ? の部分は0から始まる連番
; 1つめの AddPartHatch は 機体名_hatch0.obj
; 2つめの AddPartHatch は 機体名_hatch1.obj
; このファイル名のモデルが見つからない場合、表示されない (表示が不要であれば、モデルは不要)

AddPartSlideHatch = 移動量X, 移動量Y, 移動量Z
; スライドして開くタイプのハッチを追加
; モデルファイル名(回転/スライド共通) 機体名_hatch?.obj (命名規則はAddPartHatchを参照)

AddPartCamera
; 常にプレイヤーの方向を向くパーツを追加する。
; 2番席にモブが居る場合、2番席のモブの方向を向く。
; モデルファイル名 機体名_camera?.obj (命名規則はAddPartHatchを参照)

AddPartWeapon    = m230,       false, true, true,  -2.51,  1.29,  -1.51
AddPartWeapon    = m102_105mm, false, true, true,  -2.51,  1.29,  -1.51, 1.00
AddPartRotWeapon = m134_r50,   false, true, true,  -1.825, 1.475, -0.25, 1,0,0
; ヘリコプター＆戦闘機用の武器パーツ設定
; AddPartWeapon = 連動する武器名(無しの時はnone), ガンナー時非表示？, Yaw連動, Pitch連動, 回転座標X,Y,Z, 駐退距離
; AddPartRotWeapon = 連動する武器名(無しの時はnone), ガンナー時非表示？, Yaw連動, Pitch連動, 回転座標X,Y,Z, 回転軸X,Y,Z
; AddWeapon で追加した武器に連動して角度が変わる。
; 武器の角度の範囲もAddWeaponで追加した武器に従う。
; 駐退距離は砲の駐退する距離
; AddPartRotWeapon はガトリング用で、武器使用中は回転する
; モデルファイル名 機体名_weapon?.obj (命名規則はAddPartHatchを参照)

AddPartWeaponBay = 武器名, 位置X, 位置Y, 位置Z, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180
; 回転して開くタイプのウェポンベイを追加
AddPartSlideWeaponBay = 武器名, 移動量X, 移動量Y, 移動量Z
; スライドして開くタイプのウェポンベイを追加
; モデルファイル名(回転/スライド共通) 機体名_wb?.obj
; モデルファイル名 機体名_wb?.obj (命名規則はハッチを参照)

AddPartCanopy = 位置X, 位置Y, 位置Z, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180
; 回転して開くタイプのキャノピーを追加
AddPartSlideCanopy = 移動量X, 移動量Y, 移動量Z
; スライドして開くタイプのキャノピーを追加
; モデルファイル名(回転/スライド共通) 機体名_canopy?.obj
; キャノピーは複数追加できるようになった
; モデルファイル名 機体名_canopy?.obj (命名規則はハッチを参照)
; 互換性のためキャノピーのみ数値部分を省略すると、機体名_canopy0.obj として扱われる。

AddPartLG = 位置X, 位置Y, 位置Z, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180 [, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180]
AddPartLGRev = 位置X, 位置Y, 位置Z, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180 [, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180]
AddPartSlideRotLG = 移動量X, 移動量Y, 移動量Z,  位置X, 位置Y, 位置Z, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180
AddPartLGHatch = 位置X, 位置Y, 位置Z, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180 [, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180]
; ランディングギアを追加
; 離陸時などに自動で展開/格納
; モデルファイル名 機体名_lg?.obj (命名規則はハッチを参照)
; AddPartLGRev はAddPartLGと動作が逆転する。
; AddPartLGHatch はギアの折りたたみか展開時のみ開く。
;
; AddPartLG         ... ギア折りたたみ時 0  → 90
; AddPartLGRev      ... ギア折りたたみ時 90 → 0
; AddPartSlideRotLG ... ギア折りたたみ時 0  → 90
; AddPartLGHatch    ... ギア折りたたみ時 0  → 90 → 0

ThrottleUpDown = 1.0
ThrottleUpDownOnEntity = 2.0
; スロットルの上げ下げの係数
; 小さいほどスロットルが上がりにくくなり、離陸に時間が掛かる
;
; ThrottleUpDownOnEntity は機体が他のエンティティに乗っている時のスロットルの上げ下げ係数(デフォルト 2.0)
; 機体が他のエンティティに乗っている時は以下の計算
; ThrottleUpDown * 乗っているエンティティの速度 * ThrottleUpDownOnEntity -> スロットルの上がりやすさ
; 例：ThrottleUpDownOnEntity = 2.0でマインカートに乗せた場合、最大速度は約1.7なので、
;     1.7 * 2.0 = 3.4、つまり 約1/3の距離で離陸できる

AutoPilotRot = -0.4
; 自動旋回時の角度。大きいほど回転量が大きくなる。
; 0にすると直進する。
; 負の値の場合は左に、正の値の場合は右に回転する。

ConcurrentGunnerMode = true
; 2番席にプレイヤーがいてもガンナーモードになれる。

Regeneration = true
; 2番席以降のモブが自動回復する

ParticlesScale = 0.1
; 砂煙などのエフェクトサイズを変える 0.1
; 大きいほどサイズが大きくなる。

FuelSupplyRange = 25
; 他の機体に燃料を補給するための設定
; この範囲にいる全ての機体に燃料を補給する。上記例では 25m
; 他の機体に補給しても自機の燃料は減らない
; ただし、自機には補給できない

AmmoSupplyRange = 35
; 他の機体に弾を補給するための設定
; この範囲にいる全ての機体に弾を補給する。上記例では 35m
; 他の機体に補給しても自機の弾は減らない
; ただし、自機には補給できない


MaxFuel         = 600
; 燃料搭載可能量
FuelConsumption = 0.5
; 1秒間に消費する燃料
; 飛行可能時間[秒] = 燃料搭載可能量 / 1秒間に消費する燃料
; 1200 sec = 600 / 0.5


Stealth = 0.5
; ステルス性の設定 (0.0～1.0)。
; デフォルト=0.0
; 大きいほどミサイルにロックオンされにくくなる
; ロックにかかる時間が伸び、ロック可能な距離が縮む。

SmoothShading = false
; スムースシェーディングの有効無効の切り替え
; false にすると角が補完されないフラットシェーディングになる
; true  にすると角を滑らかに表示するスムースシェーディングが有効になる
; mcheli.cfg のSmoothShadingをfalseにすると、全ての機体がフラットシェーディングになる

HideEntity = false
; 乗っているプレイヤーを非表示にするかどうかの設定
; true  = 非表示にする
; false = 表示する

CanRide = false
; 機体に乗れなくする設定
; true  = 機体に乗れる(デフォルト)
; false = 機体に乗れない


;***********************************************************************************
;■ヘリコプター設定ファイル helicopters/abc.txt, models/helicopters/abc.obj, textures/helicopters/abc.png, textures/items/abc.png
;***********************************************************************************

;ヘリコプターを増やすには以下の4ファイルが必要 (全て小文字であること)
; ・helicopters フォルダにヘリコプター設定ファイル
; ・models/helicopters フォルダにヘリコプターのモデル
; ・textures/helicopters フォルダにヘリコプターテクスチャファイル
; ・textures/items フォルダにアイテムのテクスチャファイル

EnableFoldBlade = false
;ブレードの折りたたみ機能の有無(true=有り、false無し)


AddRotor= 6, 60,  0.00,  3.35,  0.00,  0.0, 1.0, 0.0, true
AddRotor= 2, 60,  0.50,  1.90, -6.55,  1.0, 0.0, 0.0
;ローターを追加する (何個でも良い)
; この例では 1つ目がメインローター、2つ目がテールローター
; ブレードを折りたたみできるのは1つ目のローターのブレードのみ
; パラメータは前から順に ブレード数、ブレード間の角度、位置(X,Y,Z)、回転軸(X,Y,Z)、ブレード折りたたみ機能有無(true/false)
; モデルファイル名 機体名_rotor?.obj (命名規則はハッチを参照)

※ AddRotorOld は古いモデル用なので、使用しないで下さい。


;***********************************************************************************
;■戦闘機設定ファイル planes/abc.txt, models/planes/abc.obj, textures/planes/abc.png, textures/items/abc.png
;***********************************************************************************

;戦闘機を増やすには以下の4ファイルが必要 (全て小文字であること)
; ・planes フォルダに戦闘機設定ファイル
; ・models/planes フォルダに戦闘機のモデル
; ・textures/planes フォルダに戦闘機テクスチャファイル
; ・textures/items フォルダにアイテムのテクスチャファイル

AddPartRotor = 位置X, 位置Y, 位置Z, 回転軸X, 回転軸Y, 回転軸Z, 回転角度(-180~180)
; ローターを追加
; スロットルを上げても回転しない。VTOL時に回転する。
; モデルファイル名 機体名_rotor?.obj (命名規則はハッチを参照)
; (オスプレイ以外の機体ではモデルを用意する必要がない)
AddBlade = ブレード描画数, ブレード間の角度, 位置X, 位置Y, 位置Z, 回転軸X, 回転軸Y, 回転軸Z
; AddPartRotor の後に追加しなければならない。
; 各ローターのブレード
; モデルファイル名 機体名_blade?.obj (命名規則はハッチを参照)

AddPartWing = 位置X, 位置Y, 位置Z, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180
; 折りたためる主翼を追加
; モデルファイル名 機体名_wing?.obj (命名規則はハッチを参照)
AddPartPylon = 位置X, 位置Y, 位置Z, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180
; 折りたためる主翼のパイロンを追加
; モデルファイル名 機体名_wing?_pylon?.obj (命名規則はハッチを参照)
; 必ず AddPartPylon より前に AddPartWing が無ければならない。
; 例
; AddPartWing  =  1.50, 2.50, -4.57,  0, 1,0, 35 この場合のモデル名: 機体名_wing0.obj
; AddPartPylon =  6.69, 2.50, -7.18,  0,-1,0, 35 この場合のモデル名: 機体名_wing0_pylon0.obj
; AddPartPylon =  3.92, 2.50, -6.34,  0,-1,0, 35 この場合のモデル名: 機体名_wing0_pylon1.obj

VariableSweepWing = true
SweepWingSpeed = 1.2
; 可変翼の設定
; AddPartWing で折りたためる主翼を追加した場合のみ有効
; VariableSweepWing = true 空中で主翼を折りたためるようになる
; SweepWingSpeed = 1.2 主翼を折りたたんだ時のスピード

AddPartNozzle = 位置X, 位置Y, 位置Z, 回転軸X, 回転軸Y, 回転軸Z, 回転角度 0～180
; 戦闘機のノズルを追加
; スロットルを上げると煙のエフェクトが出る
; VTOL時に回転する
; モデルファイル名 機体名_nozzle?.obj (命名規則はハッチを参照)

EnableVtol = true
; VTOL 機能の有無(false=VTOl機能無し, true=VTOl可能)
DefaultVtol = true
; VTOL機能有りの場合の、デフォルトのVTOL状態
; trueにすると地上にいる際に自動でVTOL状態になる
VtolYaw = 0.3
; VTOL 状態での横方向の回転量
VtolPitch = 0.3
; VTOL 状態での仰角の回転量



;***********************************************************************************
;■地上兵器設定ファイル vehicles/abc.txt, models/vehicles/abc.obj, textures/vehicles/abc.png, textures/items/abc.png
;***********************************************************************************

;地上兵器を増やすには以下の4ファイルが必要 (全て小文字であること)
; ・vehicles フォルダに地上兵器設定ファイル
; ・models/vehicles フォルダに地上兵器のモデル
; ・textures/vehicles フォルダに地上兵器テクスチャファイル
; ・textures/items フォルダにアイテムのテクスチャファイル

AddPart = Param1, Param2, Param3, Param4, 位置X, 位置Y, 位置Z
; プレイヤーに合わせて回転するパーツの追加
; Param1 = 1人称視点時に非表示にするかどうか true=表示, false=非表示
; Param2 = プレイヤーに合わせて横方向に回転するか true=回転する, false=回転しない
; Param3 = プレイヤーに合わせて縦方向に回転するか true=回転する, false=回転しない
; Param4 = パーツタイプ、0=通常(機能無し), 1=武器を使用すると回転する, 2=武器を使用すると駐退する
; モデルファイル名 機体名_part?.obj (命名規則はハッチを参照)
AddChildPart = Param1, Param2, Param3, Param4, 位置X, 位置Y, 位置Z
; AddPart に追加するパーツ
; AddPart の後に追加する必要がある。パラメータはAddPartと同じ。
; このパーツは命名規則が特殊。
; モデルファイル名 機体名_part?_#.obj
; AddPart で追加したモデルに更に _# をつける必要がある (#は0から始まる連番)
; 例
; AddPart		=  true, true,  false, 0,   0.00, 0.00, 0.00 → 機体名_part0.obj
; AddChildPart	= false, false, true,  0,  -1.00, 0.00, 2.00 → 機体名_part0_0.obj
; AddChildPart	= false, false, true,  0,   1.00, 0.00, 2.00 → 機体名_part0_1.obj

; RotationPitchMax, RotationPitchMin は古い設定なので使用しないこと。
