PGDMP  8                     }            tubes_sisterin    16.2    16.2 ;    3           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            4           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            5           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            6           1262    34938    tubes_sisterin    DATABASE     �   CREATE DATABASE tubes_sisterin WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Indonesian_Indonesia.1252';
    DROP DATABASE tubes_sisterin;
                postgres    false            ^           1247    34984 
   req_status    TYPE     Y   CREATE TYPE public.req_status AS ENUM (
    'pending',
    'approved',
    'rejected'
);
    DROP TYPE public.req_status;
       public          postgres    false            [           1247    34972 	   user_role    TYPE     B   CREATE TYPE public.user_role AS ENUM (
    'admin',
    'user'
);
    DROP TYPE public.user_role;
       public          postgres    false            �            1259    34992    adoption_requests    TABLE     �  CREATE TABLE public.adoption_requests (
    id integer NOT NULL,
    user_id integer NOT NULL,
    animal_id integer NOT NULL,
    income character varying,
    living_type character varying,
    has_pets boolean,
    reason text,
    status public.req_status DEFAULT 'pending'::public.req_status NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);
 %   DROP TABLE public.adoption_requests;
       public         heap    postgres    false    862    862            �            1259    34991    adoption_requests_id_seq    SEQUENCE     �   CREATE SEQUENCE public.adoption_requests_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.adoption_requests_id_seq;
       public          postgres    false    220            7           0    0    adoption_requests_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.adoption_requests_id_seq OWNED BY public.adoption_requests.id;
          public          postgres    false    219            �            1259    35021 	   cat_needs    TABLE     !  CREATE TABLE public.cat_needs (
    id integer NOT NULL,
    breed character varying(50) NOT NULL,
    food character varying(100) NOT NULL,
    food_per_day integer NOT NULL,
    treatment character varying(100),
    accessories character varying(100),
    cage character varying(100)
);
    DROP TABLE public.cat_needs;
       public         heap    postgres    false            �            1259    35020    cat_needs_id_seq    SEQUENCE     �   CREATE SEQUENCE public.cat_needs_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.cat_needs_id_seq;
       public          postgres    false    224            8           0    0    cat_needs_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.cat_needs_id_seq OWNED BY public.cat_needs.id;
          public          postgres    false    223            �            1259    35012    cats    TABLE     C  CREATE TABLE public.cats (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    breed character varying(50) NOT NULL,
    age integer,
    health_status character varying(100),
    description text,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    image text
);
    DROP TABLE public.cats;
       public         heap    postgres    false            �            1259    35011    cats_id_seq    SEQUENCE     �   CREATE SEQUENCE public.cats_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.cats_id_seq;
       public          postgres    false    222            9           0    0    cats_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.cats_id_seq OWNED BY public.cats.id;
          public          postgres    false    221            �            1259    43151    foods    TABLE     4  CREATE TABLE public.foods (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    price numeric(10,2) NOT NULL,
    image_url text NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    description text,
    stock integer DEFAULT 0 NOT NULL
);
    DROP TABLE public.foods;
       public         heap    postgres    false            �            1259    43150    foods_id_seq    SEQUENCE     �   CREATE SEQUENCE public.foods_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.foods_id_seq;
       public          postgres    false    226            :           0    0    foods_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.foods_id_seq OWNED BY public.foods.id;
          public          postgres    false    225            �            1259    34954 
   migrations    TABLE     (  CREATE TABLE public.migrations (
    id bigint NOT NULL,
    version character varying(255) NOT NULL,
    class character varying(255) NOT NULL,
    "group" character varying(255) NOT NULL,
    namespace character varying(255) NOT NULL,
    "time" integer NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    34953    migrations_id_seq    SEQUENCE     z   CREATE SEQUENCE public.migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    218            ;           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    217            �            1259    43160    orders    TABLE     �   CREATE TABLE public.orders (
    id integer NOT NULL,
    food_id integer NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);
    DROP TABLE public.orders;
       public         heap    postgres    false            �            1259    43159    orders_id_seq    SEQUENCE     �   CREATE SEQUENCE public.orders_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.orders_id_seq;
       public          postgres    false    228            <           0    0    orders_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.orders_id_seq OWNED BY public.orders.id;
          public          postgres    false    227            �            1259    34940    users    TABLE       CREATE TABLE public.users (
    id integer NOT NULL,
    email character varying(100) NOT NULL,
    password_hash character varying(255) NOT NULL,
    full_name character varying(100) NOT NULL,
    phone_number character varying(15),
    address text,
    user_type character varying(10) DEFAULT 'adopter'::character varying,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    role public.user_role DEFAULT 'user'::public.user_role
);
    DROP TABLE public.users;
       public         heap    postgres    false    859    859            �            1259    34939    users_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    216            =           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    215            z           2604    34995    adoption_requests id    DEFAULT     |   ALTER TABLE ONLY public.adoption_requests ALTER COLUMN id SET DEFAULT nextval('public.adoption_requests_id_seq'::regclass);
 C   ALTER TABLE public.adoption_requests ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    220    220            }           2604    35024    cat_needs id    DEFAULT     l   ALTER TABLE ONLY public.cat_needs ALTER COLUMN id SET DEFAULT nextval('public.cat_needs_id_seq'::regclass);
 ;   ALTER TABLE public.cat_needs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    223    224            |           2604    35015    cats id    DEFAULT     b   ALTER TABLE ONLY public.cats ALTER COLUMN id SET DEFAULT nextval('public.cats_id_seq'::regclass);
 6   ALTER TABLE public.cats ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    221    222            ~           2604    43154    foods id    DEFAULT     d   ALTER TABLE ONLY public.foods ALTER COLUMN id SET DEFAULT nextval('public.foods_id_seq'::regclass);
 7   ALTER TABLE public.foods ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    226    226            y           2604    34957    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217    218            �           2604    43163 	   orders id    DEFAULT     f   ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);
 8   ALTER TABLE public.orders ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    228    228            t           2604    34943    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    216    216            (          0    34992    adoption_requests 
   TABLE DATA           �   COPY public.adoption_requests (id, user_id, animal_id, income, living_type, has_pets, reason, status, created_at, updated_at) FROM stdin;
    public          postgres    false    220   JE       ,          0    35021 	   cat_needs 
   TABLE DATA           `   COPY public.cat_needs (id, breed, food, food_per_day, treatment, accessories, cage) FROM stdin;
    public          postgres    false    224   F       *          0    35012    cats 
   TABLE DATA           o   COPY public.cats (id, name, breed, age, health_status, description, created_at, updated_at, image) FROM stdin;
    public          postgres    false    222   �G       .          0    43151    foods 
   TABLE DATA           g   COPY public.foods (id, name, price, image_url, created_at, updated_at, description, stock) FROM stdin;
    public          postgres    false    226   �I       &          0    34954 
   migrations 
   TABLE DATA           [   COPY public.migrations (id, version, class, "group", namespace, "time", batch) FROM stdin;
    public          postgres    false    218   "N       0          0    43160    orders 
   TABLE DATA           N   COPY public.orders (id, food_id, user_id, created_at, updated_at) FROM stdin;
    public          postgres    false    228   "O       $          0    34940    users 
   TABLE DATA           �   COPY public.users (id, email, password_hash, full_name, phone_number, address, user_type, created_at, updated_at, role) FROM stdin;
    public          postgres    false    216   iO       >           0    0    adoption_requests_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.adoption_requests_id_seq', 4, true);
          public          postgres    false    219            ?           0    0    cat_needs_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.cat_needs_id_seq', 5, true);
          public          postgres    false    223            @           0    0    cats_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.cats_id_seq', 5, true);
          public          postgres    false    221            A           0    0    foods_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.foods_id_seq', 13, true);
          public          postgres    false    225            B           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 10, true);
          public          postgres    false    217            C           0    0    orders_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.orders_id_seq', 6, true);
          public          postgres    false    227            D           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 10, true);
          public          postgres    false    215            �           2606    35000 &   adoption_requests pk_adoption_requests 
   CONSTRAINT     d   ALTER TABLE ONLY public.adoption_requests
    ADD CONSTRAINT pk_adoption_requests PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.adoption_requests DROP CONSTRAINT pk_adoption_requests;
       public            postgres    false    220            �           2606    35026    cat_needs pk_cat_needs 
   CONSTRAINT     T   ALTER TABLE ONLY public.cat_needs
    ADD CONSTRAINT pk_cat_needs PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.cat_needs DROP CONSTRAINT pk_cat_needs;
       public            postgres    false    224            �           2606    35019    cats pk_cats 
   CONSTRAINT     J   ALTER TABLE ONLY public.cats
    ADD CONSTRAINT pk_cats PRIMARY KEY (id);
 6   ALTER TABLE ONLY public.cats DROP CONSTRAINT pk_cats;
       public            postgres    false    222            �           2606    43158    foods pk_foods 
   CONSTRAINT     L   ALTER TABLE ONLY public.foods
    ADD CONSTRAINT pk_foods PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.foods DROP CONSTRAINT pk_foods;
       public            postgres    false    226            �           2606    34961    migrations pk_migrations 
   CONSTRAINT     V   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT pk_migrations PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.migrations DROP CONSTRAINT pk_migrations;
       public            postgres    false    218            �           2606    43165    orders pk_orders 
   CONSTRAINT     N   ALTER TABLE ONLY public.orders
    ADD CONSTRAINT pk_orders PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.orders DROP CONSTRAINT pk_orders;
       public            postgres    false    228            �           2606    34952    users users_email_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);
 ?   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_key;
       public            postgres    false    216            �           2606    34950    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    216            �           2606    35001 3   adoption_requests adoption_requests_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.adoption_requests
    ADD CONSTRAINT adoption_requests_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;
 ]   ALTER TABLE ONLY public.adoption_requests DROP CONSTRAINT adoption_requests_user_id_foreign;
       public          postgres    false    4740    220    216            �           2606    43166    orders orders_food_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_food_id_foreign FOREIGN KEY (food_id) REFERENCES public.foods(id) ON UPDATE CASCADE ON DELETE CASCADE;
 G   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_food_id_foreign;
       public          postgres    false    4750    228    226            �           2606    43171    orders orders_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;
 G   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_user_id_foreign;
       public          postgres    false    4740    216    228            (   �   x�m���0 ��� *��|�����mPGI(b{ܪB<�,�a��r��k�٦J��̱B�+N�0R3ME��ŊU0eY��"G��B��C�~�1'��v�(���+t$��Io�K"�<s�gv\V����KVE�j5lu����Op���hzѻl���nG�'_���q	Y�J�����~Uwk�� 8�[�      ,   �  x�u��n�0���S��k���vV H��BˌMD�<�J�>�h�A��N�J����
{NY(�>� e�]��&��[��w�S�.�8H�B�M*��8�D��%�1�5N�#9�%����*�c�'ņ��J�;8
��I�>&f|a}�{;J�nH��L+��ٝ�e��3('r*^�n�J���X�x����������,�Tb����*������ST��hXP�W����8z�p�t�)Y/:C4�u�YKj'̟%���@�#'�W�CGtŝ���-��C,:�^l�"YV�U��i����̍Ԕn�S6�q��u,������8���7ˮ�«}�	�E݂r2����Ԗ�ͅe���lH��\Q�7��2K������i��J��f�ϗ���k��s      *     x���Ao�0��ί���c��dw{+����T�:��Ա������q�J� \��(������d�[��3�|�E�%9�G0���[��ԣ�/=� �I����X����H!7,�L�h&o2q��>�����Ն��ΧiJ�K'�r�:���0��km�*�F2��+I��oI:��<h��#���ON��/�<��wBOa>��ע��qP��~�V��W���QM���#�\|&z2ڀꝶaV�ˍ����$'-Tn"��s��#b��WPJ[�eD��)؊փF[��}�Z�Z=��O}�B?���/n5'_���/w��N�-
6�-��ټ��0=�km���a��g��.�_�;h0����%X�+���/��z�lb�~[���ۼG�eE��h���Nb�e^�{7�èZ�=�ҳ�8	�� F�o/�L���JGy�4�(�=�H{�nXsiK��a��T?1ѤTW��	��n�Hq��˧'!d���-�}O�$���@      .   =  x��U�n�8}V��O}ZJ$uPi�I�m���%], �%��H���_ߑ�8�4`�5�̜3�g�k+�[�iT��N6��(���k��a���=7�W�V:a���b!��Ǚ��W�o�8�=o�]����\��j�vP���
���4̓("Q�"81�䄤!K��Fi'��?��c�ŘPLbD�C��O��F�s�#T�R�Ѣ�8�;~���P�����ˠ����=r�z����)W��
n��؏ɞ��f�[ǝ,�5�_�>ؔ�:H�U�Ⴡ�Z�PbH�;���uw��E)>|:�4��,��<����(ꩉb�c�s�.��9����)���N����Q���VE��\qU��R�f��(6���	��x�V��}x��(�i2����3=�^8��I�Hע���Z(�U��o�ٙ�A�� ��Y�0/�Y��[��l'*�V��������𫛗9<:���*o_�rݞ߼��l�Cu}��Me�]�.�/������}"�	��(M���бU�n�N�{A���EN]�S��F�^�uCG�;^������e����������m����������|J	!L_����O����3������;�*�}42���kn�Vw��^L�j�H�wՊG�Ԣt�B�Iv֣�C+����R��J`[=���ADH����f������ �0��S��>�y�<��� ���8&3@R�������z��Ȯ�誔�=�N$d{7_8(�{+X&�;���4��%e��5/[�����~}@�a�u��i��p����&��$�I��4͒���S�I��Q���I�a�|w�G��������A���%t;+u��2�N8���i��6̑<�� �49��ĳ���
��`:�+;��,��H�׻�X��q�Kk�b�;�Ka3���#}�	��I叽�a�j�{��;2�|o�K'��JC�ނ��q��Ҭ��|̍�{��7	����f*�˩ nw�h�;И�,Tb+������S?�2���`g����@wi�rAv��B��1��pp���       &   �   x���MO�0�s�_��8_=VEH 	z�%#�4�-�M�?-�V���G�kd
�R	�D�Ʊ��C��%��H!<C,�|Ch������J��ed��q��2ɤC���I�\��^��~�ob۸�h�Ze*�47��\���D骍J[f�]l#@ΰ o��m�!�+�묷�r�F����-��-K�O�[r��[��m�^{��q 2�%\������?�⁚�M�s��O�u�M���p�9����      0   7   x�3�4�4�4202�50�50U0��26�22�&�e�����������W� E�      $   d  x�}�MS�0���ȁ�%��M�	P��c-/�)����~�-�(��{�û�;�>UQY�ۦ��u��<پ��`��.�U�n���X����d��_{��l"�5���/y"9���P؋�/Dl�*�����T�	�}��QB��ja ��sL��Ѯ�
�׬�I�?�s�X]<\{t~+�eɌ��:��Ej�ף�����u,?*#�yh%���D��LC�]�?�~r�C��@�1jp�otDԀ��EOZ-�8�:�8ܻje�����)��G�;
�w���lL�.�|0*��΂��[�x(T�nr =0)4��u��8��@��O��5m\�?���g]ӴO�2�B     